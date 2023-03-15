<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\BrandResource;
use App\Http\Resources\ProductResource;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::latest()->get();
        return BrandResource::collection($brands);
    }

    public function show($slug)
    {
        $brand = Brand::where('slug', $slug)->first();
        if ($brand) {
            return ProductResource::collection($brand->products);
        } else {
            return response()->json(['message' => 'Not Found'], 404);
        }
    }
}
