<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <br />
        <h1 class="text-center text-primary"> SoftDelete </h1>
        <br />
        @if(session()->has('success'))

        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif

        <div class="row">

            <div class="col-md-6 text-right">
                <a href="{{route('post.index',['view_Deleted' => 'DeletedRecords'])}}" class="btn btn-primary">view
                    delete data </a>
            </div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($softdeletes) > 0)
                    @foreach($softdeletes as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->address }}</td>
                        <td>
                            <form method="post" action="{{ route('post.delete', $row->id) }}">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE" />
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="4" class="text-center">No Post Found</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>