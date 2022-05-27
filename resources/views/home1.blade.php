@extends('layouts.main')

@section('content')

<div class="container">
    <h3 class="header">{{ __('Categories') }}</h3>
    <div class="row">
        <div class="card-body">
            @if ($message = Session::get('success'))
            <div class="p-4 mb-3 bg-green-400 rounded">
                <p class="text-green-800">{{ $message }}</p>
            </div>
            @endif
        </div>
        @foreach($category as $product)
        <div class="col-sm-4">
            <a href="{{url('view-category/'.$product->cat_id)}}">
                <img src="{{ asset('uploads/products/'.$product->image) }}" height="250" width="250" /><br><br>
                <div class="container">
                    <h3 class="product"> {{$product->name}}</h3>
                    <p class="description"> {{$product->description}}</p>
                </div><br>
            </a>

        </div>
        @endforeach

    </div>
</div>

@endsection