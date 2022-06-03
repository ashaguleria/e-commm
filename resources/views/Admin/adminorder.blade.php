@extends('layouts.app')

@section('content')
<style>
.btnright {
    margin-left: 89%;
}
</style>
<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Order') }}</div>
    </div><br>
    <!-------------- SEARCH DATE------------------->
    <!-- <h4> Search Data between two Date</h4>
    <form class="row g-3" action="adminorder" method="POST">
        @csrf
        <div class="col-auto">
            <label for="fromdate" class="visually-hidden">FROM DATE</label>
            <input type="date" class="form-control" id="fromdate" value="{{old('fromdate')}}" name="fromdate">
        </div>
        <div class="col-auto">
            <label for="todate" class="visually-hidden">TO DATE</label>
            <input type="date" class="form-control" id="todate" value="{{old('todate')}}" name="todate">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-success">Search</button>
        </div>
    </form><br> -->

    <!-------------- EXPORT------------------->
    <h4>Getting Data between two date and export into csv file</h4>
    <form action="{{url('export')}}" class="row g-3" id="search-form" method="POST">
        @csrf
        <div class="col-auto">
            <label for="">From Date</label>
            <input type="date" name="FromDate" class="form-control" value="{{ old('FromDate') }}">
        </div>
        <div class="col-auto">
            <label for="">To Date</label>
            <input type="date" name="ToDate" class="form-control" value="{{ old('ToDate') }}">
        </div>
        <div class="col-auto"><br>
            <button type="submit" class="btn btn-primary">Export</button>
        </div>
    </form><br>
    <hr>
    <!-------------- IMPORT------------------->
    <!-- <h4>Import Data</h4>
    <form action="import" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Choose Csv File</label>
        <input type="file" name="file"><br><br>
        <button type="submit" class="btn btn-success" name="btn">Import CSV</button>
    </form> -->

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Search
    </button>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exportModal">
        Import
    </button>
    <a href="{{ URL::to('generate-pdf') }}" class="btn btn-primary">Export to PDF</a>

    <!---------------------Search data Model POP------------------->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search Data Between Two Date</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="adminorder" method="POST">
                        @csrf
                        <div class="col-auto">
                            <label for="fromdate" class="visually-hidden">FROM DATE</label>
                            <input type="date" class="form-control" id="fromdate" value="{{old('fromdate')}}"
                                name="fromdate">
                        </div>
                        <div class="col-auto">
                            <label for="todate" class="visually-hidden">TO DATE</label>
                            <input type="date" class="form-control" id="todate" value="{{old('todate')}}" name="todate">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!----------------------End search pop up Model ---------------------->

    <!---------------------inport data Model POP------------------->

    <div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="import" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="">Choose Csv File</label><br><br>
                        <input type="file" name="file">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Import CSV</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-------------End import pop up model ---------------->

    <!-------------- TABLE------------------->
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
                        <th>Created_at</th>
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
                        <td>{{ $item->created_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection