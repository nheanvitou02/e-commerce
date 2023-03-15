<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'brand'])->when(request()->q, function ($products) {
            $products = $products->where('title', 'like', '%' . request()->q . '%');
        })->when(request()->field, function ($products) {
            $products = $products->orderBy('' . request()->field . '', '' . request()->type . '');
        })->when(request()->category, function ($products) {
            $products = $products->where('category_id', '' . request()->category . '');
        })->when(request()->level, function ($products) {
            $products = $products->where('level', '' . request()->level . '');
        })->when(request()->brand, function ($products) {
            $products = $products->where('brand_id', '' . request()->brand . '');
        })->when(
            request()->price1,
            function ($products) {
                $products = $products->where('price', '>=', request()->price1)->where('price', '<=', request()->price2);
            }
        )->where('status', 'available')->latest()->paginate(12);
        return ProductResource::collection($products);
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();
        if ($product) {
            return new ProductResource($product);
        } else {
            return response()->json(['message' => 'Not Found'], 404);
        }
    }

    public function getNew()
    {
        $products = Product::with('category', 'brand')->where('created_at', '>=', Carbon::now()->subDays(10)->format('Y-m-d'))->where('status', 'available')->latest()->paginate(10);
        return ProductResource::collection($products);
    }

    public function getSimilar()
    {
        $products =  Product::where('category_id', request()->category_id)
            ->where('id', '!=', request()->id)
            ->where('status', 'available')->latest()->paginate(12);

        return ProductResource::collection($products);
    }
}
