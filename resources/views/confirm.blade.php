<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">

        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Cart:-
            {{ Cart::getTotalQuantity()}}</button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">CART LIST</h4>
                    </div>
                    <div class="modal-body">
                        <div class="py-12">
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                                <div>
                                    <form action="{{ route('cart.clear') }}" method="POST">
                                        @csrf
                                        <button class="btn btn-danger">Remove All
                                            Cart</button>
                                    </form>
                                </div>
                                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                    <div class="p-6 bg-white border-b border-gray-200">
                                        <table class="table table-bordered table-striped">
                                            <tr>
                                                <th>Id</th>
                                                <th></th>
                                                <th>Product Name</th>
                                                <th>Product Quantity</th>
                                                <th>Product Price</th>
                                                <th>Action</th>
                                            </tr>
                                            @foreach ($cartItems as $item)
                                            <tr>
                                                <td>{{$item->id}}</td>
                                                <td><img src="/uploads/products/{{ $item->attributes->image}}"
                                                        height="50" width="100" />
                                                </td>
                                                <td> {{ $item->name}}</td>
                                                <td>
                                                    <form action="{{ route('cart.update') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $item->id}}">
                                                        <input type="number" name="quantity"
                                                            value="{{ $item->quantity }}" class="quantity" />
                                                        <button type="submit" class="btn btn-success">update</button>
                                                    </form>
                                                </td>

                                                <td>{{ $item->price }}</td>
                                                <td>
                                                    <form action="{{ route('cart.remove') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                                        <button class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                                <div class="container1">
                                    <div>
                                        Total: ${{ Cart::getTotal() }}
                                    </div>
                                    <br>

                                    </td>

                                </div>
                                <div class="shoping">
                                    <a href="home" class="btn btn-warning">Continue shopping</a>
                                    <a href="stripe" class=" btn btn-success">Checkout </a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

    </div>

</body>

</html>