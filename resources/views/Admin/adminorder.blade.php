@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Order') }}</div>

    </div>
    <div class="row justify-content-center">

        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>product_id</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($abc as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone}}</td>
                        <td>{{ $item->address}}</td>
                        <td>{{ $item->product_id}}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

</div>
</div>
@endsection