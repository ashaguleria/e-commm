<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<style>
.container {
    padding: 3%;
}

.row {
    padding: 4%;
}
</style>

<body>

    <div class="container">
        <h3>Elequent Relationships</h3>
        <div class="row">
            <!-- First Table -->
            <h4> First Table</h4>
            <form action="save" method="POST">
                @csrf
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name">

                <label for="email">Email</label>
                <input type="text" class="form-control" name="email">

                <button type="sumit" name="btn">Submit</button>
            </form><br><br>
            <!-- 2ND Table -->
            <h4>Second Table</h4>
            <form method="POST" action="store">
                {{csrf_field()}}
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address">
                <label for="name">Name</label>
                <select class="form-control" name="table_id">
                    @foreach ($tableone as $item)
                    {
                    <option value="{{ $item->id}}">{{ $item->name }}</option>
                    }
                    @endforeach
                </select>
                <button type="submit" name="btn">submit</button>
            </form><br><br>
            <!-- 3rd Table -->
            <h4> Third Table</h4>
            <form method="POST" action="thirdpage">
                {{csrf_field()}}

                <label for="name">Name</label>
                <select class="form-control" name="tableone_id">
                    @foreach ($tableone as $item)
                    {
                    <option value="{{ $item->id}}">{{ $item->name }}</option>
                    }
                    @endforeach
                </select>

                <label for="address">Address</label>
                <select class="form-control" name="tabletwo_id">
                    @foreach ($tabletwo as $abc)
                    {
                    <option value="{{ $abc->id}}">{{ $abc->address }}</option>
                    }
                    @endforeach
                </select>
                <button type="submit" name="btn">submit</button>
            </form>
        </div>
    </div>


</body>

</html>