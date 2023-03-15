<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\InvoiceResource;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoice  = Invoice::with('orders')->when(request()->q, function ($order) {
            $order = $order->where('invoce', 'like', '%' . request()->q . '%');
        })->where('customer_id', auth()->user()->id)->latest()->paginate(5);
        return InvoiceResource::collection($invoice);
    }

    public function showTotalReceive()
    {
        $invoice  = Invoice::where('substatus', 'receive')->where('customer_id', auth()->user()->id)->count();
        return $invoice;
    }

    public function show($invoice)
    {
        return new InvoiceResource(Invoice::where('invoice', $invoice)->first());
    }

    public function update($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->status = 'success';
        $invoice->substatus = 'received';
        $invoice->save();
    }
}
