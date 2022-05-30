@extends('layouts.app')

@section('content')
<style>
label.btn.btn-default.active.toggle-off {
    background-color: #e34b4b;
}
</style>
<div class="container">
    <div class="card">
        <h3 class="card-header"><b>{{ __('Product') }}</b></h3>
        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <a href="{{url('add-product')}}" class="btn btn-primary">Add Product</a>
        </div>
        <div class="col-md-6">
            <div class="search" style="float:right;">
                <form action="">
                    <input type="text" name="search" id="search" placeholder="Search..." value="{{ $search }}">
                    <button class="btn btn-primary"><i class="fa fa-search search-button"></i></button>
                </form>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">

        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Orignal Price</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->category->name }}</td>
                        <td>{{ $item->name }}</td>
                        <td>Rs {{ $item->orignalprice}} </td>
                        <td>Rs {{ $item->price }} </td>
                        <td>{{ $item->description }}</td>
                        <td>
                            <img src="{{ asset('uploads/products/'.$item->product_image) }}" width="70px" height="70px"
                                alt="Image">
                        </td>
                        <td>
                            <input data-id="{{$item->id}}" class="toggle-class" type="checkbox" data-toggle="toggle"
                                data-on="Active" data-off="Deactivate" {{ $item->status ? 'checked' : '' }}>
                        </td>
                        <td>
                            <a href="{{ url('edit-product/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href=" {{ url('view-product/'.$item->id) }}" class="btn btn-primary btn-sm">View</a>
                            <form action="{{ url('delete-product/'.$item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary btn-sm">Delete</button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
</div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script>
$(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0;
        var id = $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/changeStatus',
            data: {
                'status': status,
                'id': id
            },
            success: function(data) {
                console.log(data.success)
            }
        });
    })
})
</script>