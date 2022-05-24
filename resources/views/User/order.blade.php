@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">

        <div class="col-sm-6">
            <form action="{{ url('order') }}" method="POST" enctype="multipart/form-data">
                @csrf


                <input type="hidden" name="product_id" class="form-control" value=" {{$product->id}}">

                <div class="form-group mb-3">
                    <label for=""> Name</label>
                    <input type="text" name="name" class="form-control" value="  {{ Auth::user()->name }}">
                </div>

                <div class="form-group mb-3">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" value="  {{ Auth::user()->email}}">
                </div>

                <div class="form-group mb-3">
                    <label for="">Phone number</label>
                    <input type="text" name="phone" class="form-control">

                </div>
                <div class="form-group mb-3">
                    <label for="">Address</label>
                    <input type="text" name="address" class="form-control">
                </div>
        </div>
        <div class="col-sm-6">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="{{ asset('uploads/products/'.$product->product_image) }}" height="100"
                                width="100"></td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}} rs</td>
                        <td> 1</td>
                    </tr>
                </tbody>
            </table>
            <div class="total">
                Total:- {{$product->price}} Rs
            </div>
            <!-- <a href="stripe"> <button type="submit" class="btn btn-success">Orderplace</button></a><br> -->
            <span style="float: right;">
                <form action="{{ route('cart.checkout') }}" method="POST">
                    @csrf
                    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="pk_test_51KvwMySHCUQWcSVbWa9aJiEX6DZDBqwlB0nH78FpdlnKTqRwXkWrcSQ0IYzVFjLsZ7k14bZWXVZqEwvBkMsDlKSo00fSk098Ug"
                        data-amount="{{$product->price}} * 100" data-description="Buy some book" data-locale="auto">
                    </script>
                </form>
            </span>
            </form>
        </div>
    </div>
    @endsection