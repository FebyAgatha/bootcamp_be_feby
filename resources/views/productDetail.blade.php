<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Home</title>
</head>
<body>
    <div class="card m-5" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{$product->productName}}</h5>
            <a href="{{route('categoryDetail', ['id' => $product->category->id])}}" class="card-text">{{$product->category->category}}</a>
            <p class="card-text">{{$product->productPrice}}</p>
            <p class="card-text">{{$product->quantity}}</p>
            <p class="card-text">{{$product->image}}</p>
            <img src="{{asset('./storage/products/'.$product->image)}}" alt="">
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>