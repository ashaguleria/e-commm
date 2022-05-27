@extends('layouts.app')
@section('content')
<style>
label.btn.btn-default.active.toggle-off {
    background-color: #dc3545;
}
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>



<div class="container">

    <div class="card">
        <h3 class="card-header"><b>{{ __('Category') }}</b></h3>
        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
        </div>
    </div>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addproduct">
        Add Category
    </button>
    <!-- Add Category Modal -->
    <div class="modal fade" id="addproduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('add-category') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Category Name</label>
                            <input type="text" id="name" name="name" value="{{old('name')}}" class="form-control">
                            <span class="text-danger">@error('name') {{$message}} @enderror</span><br><br>
                            <div id="name"></div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Description</label>
                            <input type="text" id="description" name=" description" value="{{old('description')}}"
                                class="form-control">
                            <span class="text-danger">@error('description') {{$message}} @enderror</span><br><br>
                            <div id="description"></div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Product Image</label>
                            <input type="file" name="image" value="{{old('image')}}" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Add Category Modal End -->

    <!-- retrieve data from database -->
    <div class="row justify-content-center">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $cate)
                    <tr>
                        <td>{{ $cate->id }}</td>
                        <td>{{ $cate->name }}</td>
                        <td>{{ $cate->description }}</td>
                        <td>
                            <img src="{{ asset('uploads/products/'.$cate->image) }}" width="70px" height="70px"
                                alt="Image">
                        </td>
                        <td>
                            <input data-id="{{$cate->id}}" class="toggle-class" type="checkbox" data-toggle="toggle"
                                data-on="Active" data-off="Deactivate" {{ $cate->status ? 'checked' : '' }}>
                        </td>
                        <td> <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                data-bs-target="#editmodel{{$cate->id}}"> edit </button>

                            <a href="{{ url('delete-product/'.$cate->id) }}" class="btn btn-danger btn-sm">Delete</a>
                            <a href="{{ url('view-category/'.$cate->id) }}" class="btn btn-warning btn-sm">view</a>
                        </td>
                    </tr>

                    <!-- edit category popup model -->
                    <div class="modal fade" id="editmodel{{$cate->id}}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <form action="update-product/{{$cate->id}}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <input type="hidden" value="{{ $cate-> id}}">
                                        <div class="form-group mb-3">
                                            <label for="">Category Name</label>
                                            <input type="text" name="name" value="{{$cate->name}}" class="form-control">
                                            <span class="text-danger">@error('name') {{$message}}
                                                @enderror</span><br><br>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Description</label>
                                            <input type="text" name="description" value="{{$cate->description}}"
                                                class="form-control">
                                            <span class="text-danger">@error('description') {{$message}}
                                                @enderror</span><br><br>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Product Image</label>
                                            <input type="file" name="image" class="form-control">
                                            <img src="{{ asset('uploads/products/'.$cate->image) }}" width="70px"
                                                height="70px" alt="Image">
                                            <span class="text-danger">@error('image') {{$message}}
                                                @enderror</span><br><br>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end edit popup model -->
                    @endforeach
                </tbody>
            </table>
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
            url: '/product',
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
<script type="text/javascript">
$(function() {
    $("#btnSubmit").click(function() {
        var name = $("#name").val();
        var description = $("#description").val();
        if (name == null | name == "") {
            document.getElementById("name").innerHTML = "Please enter CategoryName!";
            return false;
        }
        if (description == null | description == "") {
            document.getElementById("description").innerHTML = "Please enter description!";
            return false;
        }
    });
});
</script>