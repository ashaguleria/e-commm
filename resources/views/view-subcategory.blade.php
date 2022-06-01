@extends('layouts.main')

@section('content')

<div class="container">
    <h3 class="header">{{ __($category->name) }}</h3>
    <div class="row">
        <div class="card-body">
            @if ($message = Session::get('success'))
            <div class="p-4 mb-3 bg-green-400 rounded">
                <p class="text-green-800">{{ $message }}</p>
            </div>
            @endif
        </div>

        @foreach($product as $product)
        <div class="col-sm-4">
            <img src="{{ asset('uploads/products/'.$product->product_image) }}" height="250" width="250" /><br><br>
            <div class="container">
                <h3 class="product"> {{$product->name}}</h3>
            </div><br>
            <div class="container">
                <span class="price"><b>Price:- {{$product->price}} Rs </b></span><span class="orignal_price"><s>Rs
                        {{$product->orignalprice}}</s></span>
                <p class="description"> {{$product->description}}</p>
                <br>


            </div>
        </div>
        @endforeach

    </div>
</div>

@endsection