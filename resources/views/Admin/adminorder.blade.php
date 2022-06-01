@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Order') }}</div>

    </div>
    <div class="row input-daterange">
        <div class="col-md-4">
            <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" readonly />
        </div>
        <div class="col-md-4">
            <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" readonly />
        </div>
    </div>
    <h2 class="float-right"><a href="{{url('export-csv')}}" class="btn btn-success">Export CSV</a></h2>

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


                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

</div>
</div>
@endsection