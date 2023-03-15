<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WishlistResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        try {
            $wishlists = Wishlist::with('product')->where('customer_id', auth()->user()->id)
                ->orderBy('created_at', 'DESC')
                ->get();
        } catch (\Exception $errors) {
            $this->format(
                '10',
                'Get Item Error',
                $errors->getMessage()
            );
        }
        return WishlistResource::collection($wishlists);
    }

    public function store(Request $request)
    {
        $item = Wishlist::where('product_id', $request->product_id)
            ->where('customer_id', auth()->user()->id)->first();
        if ($item) {
            Wishlist::with('product')
                ->where('product_id', $request->product_id)
                ->delete();

            $product = Product::find($request->product_id);
            $customer = json_decode($product->customer_id, true);
            if (($key = array_search(auth()->user()->id, $customer)) !== false) {
                unset($customer[$key]);
            }
            $product->update(['customer_id' => json_encode($customer)]);
        } else {
            $item = Wishlist::create([
                'product_id' => $request->product_id,
                'customer_id' => auth()->user()->id,
            ]);

            $product = Product::find($request->product_id);
            if ($product->customer_id) {
                $customer = json_decode($product->customer_id, true);
                array_push($customer, auth()->user()->id);
            }
            $product->update(['customer_id' => json_encode($product->customer_id != null ? $customer : array(auth()->user()->id))]);
        }
        return new ProductResource($item->product);
    }
}
