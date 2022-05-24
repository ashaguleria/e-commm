@extends('layouts.main')

@section('content')
<img class="d-block w-100" src="/uploads/products/4a242b1af58a55c62deaf5a972622909.gif" alt="First slide" height="400"
    width="100%"><br>
<div class="container">

    <div class="row">
        @if ($message = Session::get('success'))
        <div class="p-4 mb-3 bg-green-400 rounded">
            <p class="text-green-800">{{ $message }}</p>
        </div>
        @endif
        @foreach($products as $product)
        <div class="col-sm-4">

            <img src="{{ asset('uploads/products/'.$product->product_image) }}" height="250" width="250" /><br><br>
            <div class="container">
                <h3 class="product"> {{$product->name}}</h3>
            </div><br>
            <!-- <h3 class="category">{{$product->category}} </h3> -->
            <div class="container">

                <span class="price"><b>Price:- {{$product->price}} Rs </b></span>
                <p class="description"> {{$product->description}}</p>


                <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ $product->id }}" name="id">
                    <input type="hidden" value="{{ $product->name }}" name="name">
                    <input type="hidden" value="{{ $product->price }}" name="price">
                    <input type="hidden" value="{{ $product->product_image }}" name="image">
                    <input type="hidden" value="1" name="quantity">

                    <button class="btn btn-success">Add To Cart</button>
                </form><br>


            </div>
        </div>
        @endforeach

    </div>
</div>

@endsection