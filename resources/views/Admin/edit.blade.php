@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Edit Product') }}</div>
        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ url('update-product/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!-- <div class="form-group mb-3">
                    <label for="">Category</label>
                    <select class="form-select" name="cat_id">
                        <option value=" "> Select a Category</option>

                        <option value="{{$product->id}}">{{$product->category->name}}</option>

                    </select>
                </div> -->

                <div class="form-group mb-3">
                    <label for="">Product Name</label>
                    <input type="text" name="name" class="form-control" value="{{$product->name}}">
                    <span class="text-danger">@error('name') {{$message}} @enderror</span><br><br>
                </div>

                <div class="form-group mb-3">
                    <label for="">Product Orignal Price</label>
                    <input type="text" name="orignalprice" class="form-control" value="{{$product->orignalprice}}">
                    <span class="text-danger">@error('orignalprice') {{$message}} @enderror</span><br><br>
                </div>

                <div class="form-group mb-3">
                    <label for="">Product Price</label>
                    <input type="text" name="price" class="form-control" value="{{$product->price}}">
                    <span class="text-danger">@error('price') {{$message}} @enderror</span><br><br>
                </div>

                <div class="form-group mb-3">
                    <label for="">Product description</label>
                    <input type="text" name="description" class="form-control" value="{{$product->description}}">
                    <span class="text-danger">@error('description') {{$message}} @enderror</span><br><br>

                </div>
                <div class="form-group mb-3">
                    <label for="">Product Image</label>
                    <input type="file" name="product_image" class="form-control">
                    <img src="{{ asset('uploads/products/'.$product->product_image) }}" width="70px" height="70px"
                        alt="Image">
                    <span class="text-danger">@error('product_image') {{$message}} @enderror</span><br><br>

                </div>
                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>

            </form>

        </div>
        @endsection