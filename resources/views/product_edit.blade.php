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

 
 <form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')


 
    <div class="form-group">
      <label for="email">Enter Product Name:</label>
      <input type="text"  class="form-control"  name="product_name" value="{{$product->product_name}}" class="@error('product_name') is-invalid @enderror">
      @error('product_name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    </div>
    <div class="form-group">
      <label for="email">Enter Product Quantity:</label>
      <input type="text" class="form-control"  name="product_quantity" value="{{$product->product_quantity}}" class="@error('product_quantity') is-invalid @enderror">
      @error('product_quantity')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    </div>
    <div class="form-group">
      <label for="email">Enter Product Price:</label>
      <input type="text" class="form-control" name="product_price" value="{{$product->product_price}}" class="@error('product_price') is-invalid @enderror">
      @error('product_price')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    </div>
    <div class="form-group">
      <label for="email">Enter Product Code:</label>
      <input type="text" class="form-control"  name="product_code" value="{{$product->product_code}}" class="@error('product_code') is-invalid @enderror">
      @error('product_code')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    </div>
   

    <div class="form-group">
      <label for="comment">Product Description:</label>
      <textarea class="form-control" rows="5" name="product_description"  class="@error('product_description') is-invalid @enderror">{{$product->product_description}}</textarea>
      @error('product_description')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    </div>


    <div class="form-group">
    Enter Image:<input type="file" name="product_image"> 
     
     @if ($errors->first('product_image'))<div class="alert alert-danger">{!! $errors->first('product_image') !!}</div> @endif
     
     <br> 
     <img src="{{ asset('image/' . $product->product_image) }}" alt="" height="90px" width="120">
      <br> <br>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
