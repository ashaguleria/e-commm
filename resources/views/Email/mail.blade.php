 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     <title>Document</title>
 </head>
 <style>
.form-control {

    width: 27%;
}
 </style>

 <body>
     <div class="container">
         <div class="row">
             <h3>Send mail</h3>
             @if(session()->has('message'))
             <div class="alert alert-success">
                 {{ session()->get('message') }}
             </div>
             @endif
             <form action="/send-email" method="POST" enctype="multipart/form-data">
                 @csrf

                 Name<input type="text" class="form-control" name="name" value="{{Auth::user()->name}}"><br>
                 To <input type="text" class="form-control" name="email" value="{{ Auth::user()->email}}"><br>
                 <input type="hidden" name="password" value="{{Auth::user()->password}}">
                 body<input type="text" class="form-control" name="body"><br>
                 <div class="form-group">
                     <label for="resume">Attach</label>
                     <input type="file" class="form-control" name="image" />
                 </div>
                 <button type="submit" name="btnsub"> Submit</button>
             </form>
         </div>
     </div>
 </body>

 </html>
 <?php