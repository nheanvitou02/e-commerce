<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CheckoutResource;
use App\Models\Cart;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Midtrans\Snap;

class CheckOutController extends Controller
{
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {

            $random = '';
            $length = 10;

            for ($i = 0; $i < $length; $i++) {
                $random .= rand(0, 1) ? rand(0, 9) : chr(rand(ord('a'), ord('z')));
            }

            $no_invoice = 'INV-' . Str::upper($random);

            $invoice = Invoice::create([
                'invoice' => $no_invoice,
                'customer_id' => auth()->user()->id,
                'service' => $request->service,
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'grand_total' => $request->grand_total,
                'status' => 'pending',
            ]);

            $carts = Cart::where('customer_id', auth()->user()->id)->get();

            foreach ($carts as $cart) {
                $invoice->orders()->create([
                    'invoice_id'    => $invoice->id,
                    'invoice'       => $no_invoice,
                    'product_id'    => $cart->product_id,
                    'product_name'  => $cart->product->title,
                    'image'         => $cart->product->image,
                    'qty'           => $cart->qty,
                    'price'         => $cart->price,
                ]);
            }
            //remove cart by customer
            Cart::with('product')
                ->where('customer_id', auth()->user()->id)
                ->delete();
        });
    }
}
