@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">

        <div class="col-sm-6">
            <form action="{{ url('order') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for=""> Name</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control">
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
        <a href="stripe"> <button type="submit" class="btn btn-success">Orderplace</button></a><br>
        </form>
    </div>
</div>
@endsection