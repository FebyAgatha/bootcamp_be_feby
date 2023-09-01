<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Home</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('homepage')}}">Home</a>
                    </li>
                    @can('is_admin')
                    {{-- list ini ga bakal muncul kalo bukan admin --}}
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('addProd')}}">Add Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('addCat')}}">Add Category</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('showCat')}}">Show Category</a>
                        </li>
                    @endcan
                </ul>
                <div class="d-flex">
                    @auth
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <button class="btn btn-outline-danger" type="submit">Logout</button>
                        </form>
                    @else 
                        <a href="{{route('login')}}" class="btn btn-outline-success">Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
    <div class="d-flex m-5">
    @foreach ($produk_produk as $product)
        <div class="card m-5" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{$product->productName}}</h5>
                <a href="{{route('detailProd', ['id'=>$product->id])}}" class="btn btn-primary">See More Detail</a>
                <a href="{{route('see')}}" class="btn btn-danger">Add to Shopping Cart</a>
                {{-- <a href="" class="btn btn-primary">Add To Shopping Cart</a> --}}
                @can('is_admin')
                    <div class="mt-1">
                        <a href="{{route('editProd', ['id'=>$product->id])}}" class="btn btn-success">Update</a>
                        <form action="{{route('deleteProd', ['id'=>$product->id])}}" method="POST"  class="mt-1">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                @endcan
            </div>
        </div>
    @endforeach
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>