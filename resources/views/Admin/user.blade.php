@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ __('User') }}</div>
    </div>
    <h2 class="float-right"><a href="{{url('export-excel')}}" class="btn btn-success">Export CSV</a></h2>

    <div class="row justify-content-center">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>User Type</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->is_admin }}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection