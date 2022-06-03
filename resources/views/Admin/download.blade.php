<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
#ord {
    border-collapse: collapse;
    width: 100%;
}

#ord td,
#ord th {
    border: 1px solid #ddd;
    padding: 8px;
}
</style>

<body>
    <div class="row justify-content-center">

        <div class="card-body">

            <table class="table table-bordered table-striped" id="ord">
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
</body>

</html>