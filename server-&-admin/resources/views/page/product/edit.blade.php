@extends('layouts.app', ['title' => 'Update Product'])
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold"><i class="fas fa-shopping-bag"></i>Update Product</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('product.update', $product->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            @if ($errors->first('message'))
                                <div class="col-12">
                                    <div class="border-left-primary">
                                        <div class="alert alert-danger" role="alert">
                                            {{ $errors->first('message') }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" name="file" class="form-control">
                                        <small class="form-text text-danger">{{ $errors->first('file') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="title" value="{{ old('title', $product->title) }}"
                                            placeholder="Name" class="form-control ">
                                        <small class="form-text text-danger">{{ $errors->first('title') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select name="category_id" class="form-control">
                                            <option value="">Select category</option>
                                            @foreach ($categories as $category)
                                                @if ($product->category_id == $category->id)
                                                    <option value="{{ $category->id }}" selected>{{ $category->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <small class="form-text text-danger">{{ $errors->first('category_id') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Brand</label>
                                        <select name="brand_id" class="form-control">
                                            <option value="">Select brand</option>
                                            @foreach ($brands as $brand)
                                                @if ($product->brand_id == $brand->id)
                                                    <option value="{{ $brand->id }}" selected>{{ $brand->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <small class="form-text text-danger">{{ $errors->first('brand_id') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Level</label>
                                        <select name="level" class="form-control">
                                            @if ($product->level == 'top')
                                                <option value="top" selected>Top
                                                </option>
                                                <option value="medium">Medium
                                                </option>
                                            @else
                                                <option value="top">Top
                                                </option>
                                                <option value="medium" selected>Medium
                                                </option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            @if ($product->status == 'available')
                                                <option value="available" selected>Available
                                                </option>
                                                <option value="unavailable">Unavailable
                                                </option>
                                            @else
                                                <option value="available">Available
                                                </option>
                                                <option value="unavailable" selected>Unavailable
                                                </option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="number" name="price" class="form-control"
                                            value="{{ old('price', $product->price) }}" placeholder="Price">
                                        <small class="form-text text-danger">{{ $errors->first('price') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Discount (%)</label>
                                        <input type="number" name="discount" class="form-control"
                                            value="{{ old('discount', $product->discount) }}" placeholder="Discount (%)">
                                        <small class="form-text text-danger">{{ $errors->first('discount') }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control content" name="content" rows="12" placeholder="Description">{{ old('content', $product->content) }}</textarea>
                                <small class="form-text text-danger">{{ $errors->first('content') }}</small>

                            </div>
                            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i>
                                Submit</button>
                            <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i>
                                Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.4/tinymce.min.js"></script>
    <script>
        var editor_config = {
            selector: "textarea.content",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak ",
                "searchreplace wordcount visualblocks visualchars code fullscreen ",
                "insertdatetime media nonbreaking save table contextmenu directionality ",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media ",
            relative_urls: false,
        };
        tinymce.init(editor_config);
    </script>
@endsection
