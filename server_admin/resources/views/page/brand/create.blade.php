@extends('layouts.app', ['title' => 'Create Brand'])
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold"><i class="fas fa-folder"></i> Create Brand</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @if($errors->first('message'))
                        <div class=" col-12">
                            <div class="border-left-primary shadow-2">
                                <div class="alert alert-danger" role="alert">
                                    {{ $errors->first('message') }}
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="form-group">
                            <label>Image <span style="color : red"> *</span></label>
                            <input type="file" name="file" class="form-control">
                            <small class="form-text text-danger">{{ $errors->first('file') }}</small>
                        </div>
                        <div class="form-group">
                            <label>Name<span style="color : red"> *</label>
                            <input type="text" name="name" placeholder="Name" class="form-control">
                            <small class="form-text text-danger">{{ $errors->first('name') }}</small>
                        </div>
                        <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i>
                            Submit</button>
                        <button class="btn btn-warning btn-reset" type="reset"><i
                                class="fa fa-redo"></i>Reset
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection