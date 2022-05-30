@extends('layouts.app')

@section('content')
<style>
.product {
    padding: 27%;
}

.image {
    padding: 17%;
}
</style>
<div class="container">
    <div class="card">
        <h3 class="card-header"><b>{{ __('View Category') }}</b>
    </div>
</div>

<div class="container">
    <div class="row">

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-6 col-lg-4 ">
                    <div class="image">
                        <img src="{{ asset('uploads/products/'.$category->image) }}" width="400px" height="500px"
                            alt="Image">
                    </div>
                </div>
                <div class="col-sm-9 col-md-6 col-lg-8 ">
                    <div class="product">
                        <h4><b>Product:</b> {{$category->name}}</h4>
                        <h5><b> Description:</b> {{$category->description}}</h5><br><Br>
                        <a href="{{url('categoryproduct')}}" class="btn btn-primary btn-back">Back</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection