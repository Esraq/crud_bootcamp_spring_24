<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
 <center> <h2>CRUD Operation in Laravel</h2> </center>

 <br><br>

@if (session()->has('success'))

<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
   Operation Completed Successfully
  </div>
@endif

 <table class="table">
  <thead>
    <tr>
      <th scope="col">Product Image</th>
      <th scope="col">Product ID</th>
      <th scope="col">Product Code</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Quantity</th>
      <th scope="col">Product Description</th>
      <th scope="col">Product Price</th>
      <th colspan="2"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($products as $product)
    <tr>
      <th scope="row"><img src="{{ asset('image/' . $product->product_image) }}" height="80px" width="70px"></th>
      <td>{{$product->id}}</td>
      <td>{{$product->product_code}}</td>
      <td>{{$product->product_name}}</td>
      <td>{{$product->product_quantity}}</td>
      <td>{{$product->product_description}}</td>
      <td>{{$product->product_price}}</td>
      <th colspan="2">
      <center>
        <form action="{{ route('product.destroy',$product->id) }}" method="POST">
     
                    
      
     <a class="btn btn-primary" href="{{ route('product.edit',$product->id) }}">Edit</a>

     @csrf
     @method('DELETE')

     <button type="submit" class="btn btn-danger">Delete</button>

</center>



      </th>
    </tr>
   @endforeach
  </tbody>
</table>



 

</body>
</html>
