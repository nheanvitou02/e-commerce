<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class BrandController extends Controller
{
    public function index()
    {
        $datas =  Brand::when(request()->q, function ($brands) {
            $brands = $brands->where('name', 'like', '%' . request()->q . '%');
        })->orderBy('id', 'DESC')->paginate(5);

        return view('page.brand.index', compact('datas'));
    }

    public function create()
    {
        return view('page.brand.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:brands',
            'file' => 'required|image|mimes:jpeg,jpg,png,webp',
        ]);

        if ($validator->fails()) {
            // $validator->errors()->add('message', Lang::get('web.create-failed'));
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $image = $request->file('file');
        $image->storeAs('/public/brands/', $image->hashName());

        $data = Brand::create([
            'image' => $image->hashName(),
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
        ]);

        try {
            $data->save();
        } catch (\Exception $errors) {
            return redirect()->back()
                ->withInput()->withErrors(['message' => Lang::get('web.create-failed')]);
        }
        Session::flash('message', Lang::get('web.create-success'));
        return redirect()->route('brand.index');
    }

    public function edit(Brand $brand)
    {
        return view('page.brand.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:brands,name,' . $brand->id,
            'file' => 'nullable|image|mimes:jpeg,jpg,png|max:2000',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        if ($request->file('file')) {
            Storage::disk('local')->delete('/public/brands/' . basename($brand->image));

            $image = $request->file('file');
            $image->storeAs('/public/brands/', $image->hashName());

            $brand->update([
                'image' => $image->hashName(),
                'name' => $request->name,
                'slug' => Str::slug($request->name, '-')
            ]);
        }

        try {
            $brand->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name, '-')
            ]);
        } catch (\Exception $errors) {
            return redirect()->back()
                ->withInput();
        }

        return redirect()->route('brand.index');
    }

    public function destroy(Brand $brand)
    {
        Storage::disk('local')->delete('/public/brands/' . basename($brand->image));
        $brand->delete();

        if ($brand) {
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
