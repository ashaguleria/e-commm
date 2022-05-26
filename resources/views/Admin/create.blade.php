@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Add Product') }}</div>
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

            <!-- </div>
        <a href="{{url('products')}}" class="btn btn-primary">Add
    </div> -->
            <div class="card-body">
                <form action="{{ url('add-product') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="">Category</label>
                        <select class="form-select" name="cat_id">
                            <option value=""> Select a Category</option>
                            @foreach($category as $item)
                            <option value="{{$item->id}}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class=" form-group mb-3">
                        <label for="">Product Name</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control">
                        <span class="text-danger">@error('name') {{$message}} @enderror</span><br><br>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Product Price</label>
                        <input type="text" name="price" value="{{old('price')}}" class="form-control">
                        <span class="text-danger">@error('price') {{$message}} @enderror</span><br><br>
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Product description</label>
                        <input type="text" name="description" value="{{old('description')}}" class="form-control">
                        <span class="text-danger">@error('description') {{$message}} @enderror</span><br><br>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Product Image</label>
                        <input type="file" name="product_image" value="{{old('product_image')}}" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary">Save </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection