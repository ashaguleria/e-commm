@extends('layouts.main')
@section('content')

<div class="conatiner">
    <div class="row">
        @if ($message = Session::get('success'))
        <div class="p-4 mb-3 bg-green-400 rounded">
            <p class="text-green-800">{{ $message }}</p>
        </div>
        @endif

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h3>CART LIST</h3>
                <div>
                    <form action="{{ route('cart.clear') }}" method="POST">
                        @csrf
                        <button class="btn btn-danger">Remove All
                            Cart</button>
                    </form>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Id</th>
                                <th></th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Product Quantity</th>
                                <th>sub Total</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($cartItems as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td><img src="/uploads/products/{{ $item->attributes->image}}" height="50"
                                        width="100" />
                                </td>
                                <td> {{ $item->name}}</td>
                                <td>{{ $item->price }}</td>
                                <td>
                                    <form action="{{ route('cart.update') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id}}">

                                        <input type="number" name="quantity" value="{{ $item->quantity }}"
                                            class="quantity" style="width: 30%;" />
                                        <button type="submit" class="btn btn-success">update</button>

                                    </form>
                                </td>
                                <td>{{ $item['total'] = $item['price'] * $item->quantity}}</td>

                                <td>
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="container1">
                    <div class="cart">
                        <h3> Total: ${{ Cart::getTotal() }}</h3>
                    </div>
                    <br>

                    </td>

                </div>
                <div class="shoping">
                    <a href="/" class="btn btn-warning">Continue shopping</a>
                    <a href="stripe" class=" btn btn-success">Checkout </a>
                </div>

            </div>
        </div>

        @endsection