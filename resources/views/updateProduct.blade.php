<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Update Product</title>
</head>
<body>
    <h1>Update Product</h1>
    <form class="m-5" method="POST" action="{{route('updateProd', ['id'=>$product->id])}}">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="productName" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="productName" aria-describedby="emailHelp" name="productName" value="{{$product->productName}}">
            @error('productName')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="productPrice" class="form-label">Product Price</label>
            <input type="number" class="form-control" id="productPrice" name="productPrice" value="{{$product->productPrice}}">
            @error('productPrice')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Product Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{$product->quantity}}">
            @error('quantity')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image of Product</label>
            <input type="file" class="form-control" id="image" aria-describedby="emailHelp" name="image" value="{{$product->image}}">   
            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>