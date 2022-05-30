@extends('layouts.app')
@section('content')
<style>
.product {
    padding: 23%;
}

.image {
    padding: 17%;
}
</style>
<div class="container">
    <div class="card">
        <h3 class="card-header"><b>{{ __('View Product') }}</b>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-6 col-lg-4 ">
                    <div class="image">
                        <img src="{{ asset('uploads/products/'.$product->product_image) }}" width="400px" height="500px"
                            alt="Image">
                    </div>
                </div>
                <div class="col-sm-9 col-md-6 col-lg-8 ">
                    <div class="product">
                        <h4><b>Category:<b> {{$product->category->name}}</h4>
                        <h4><b>Product:</b> {{$product->name}}</h4>
                        <h5><b> Description:</b> {{$product->description}}</h5>
                        <h4><b> Orignal Price:</b> Rs {{$product->orignalprice}}</h4>
                        <h4><b> Price:</b> Rs {{$product->price}}</h4><br><BR>

                        if($search = " "){
                        <a href="{{url('admin/home?search')}}" class="btn btn-primary btn-center">Back</a>
                        }
                        else
                        {
                        <a href="{{url('admin/home')}}" class="btn btn-primary btn-center">Back</a>
                        }
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection