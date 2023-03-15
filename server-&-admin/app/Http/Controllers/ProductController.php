<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function index()
    {
        $datas = Product::with('category', 'brand')->when(request()->q, function ($products) {
            $products = $products->where('title', 'like', '%' . request()->q . '%');
        })->orderBy('id', 'DESC')->paginate(5);

        return view('page.product.index',  compact('datas'));
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('page.product.create', compact('categories', 'brands'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'file' => 'required|image|mimes:jpeg,jpg,png,webp|max:2000',
            'title' => 'required|unique:products',
            'category_id' => 'required',
            'brand_id' => 'required',
            'content' => 'required',
            'price' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $image = $request->file('file');
        $image->storeAs('/public/products', $image->hashName());

        $data = Product::create([
            'image' => $image->hashName(),
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'content' => $request->content,
            'price' => $request->price,
            'discount' => $request->discount,
            'level' => $request->level,
            'status' => $request->status,
        ]);

        try {
            $data->save();
        } catch (\Exception $errors) {
            return redirect()->back()
                ->withInput()->withErrors($errors);
        }
        Session::flash('message', 'success');
        return redirect()->route('product.index');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('page.product.edit', compact('product', 'categories', 'brands'));
    }

    public function update(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'nullable|image|mimes:jpeg,jpg,png|max:2000',
            'title' => 'required|unique:products,title,' . $product->id,
            'category_id' => 'required',
            'brand_id' => 'required',
            'content' => 'required',
            'price' => 'required',
            'discount' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        if ($request->file('file')) {
            Storage::disk('local')->delete('/public/products/' . basename($product->image));

            $image = $request->file('file');
            $image->storeAs('/public/products/', $image->hashName());

            $product->update([
                'image' => $image->hashName(),
                'title' => $request->title,
                'slug' => Str::slug($request->title, '-'),
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'content' => $request->content,
                'unit' => $request->unit,
                'price' => $request->price,
                'discount' => $request->discount,
                'level' => $request->level,
                'status' => $request->status,
                'keywords' => $request->keywords,
                'description' => $request->description
            ]);
        }

        try {
            $product->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title, '-'),
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'content' => $request->content,
                'unit' => $request->unit,
                'price' => $request->price,
                'discount' => $request->discount,
                'level' => $request->level,
                'status' => $request->status,
                'keywords' => $request->keywords,
                'description' => $request->description
            ]);
        } catch (\Exception $errors) {
            return redirect()->back()
                ->withInput()->withErrors($errors);
        }

        Session::flash('message', 'success');
        return redirect()->route('product.index');
    }

    public function destroy(Product $product)
    {
        Storage::disk('local')->delete('public/products/' . basename($product->image));
        $product->delete();

        if ($product) {
            return response()->json([
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
}
