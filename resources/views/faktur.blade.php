<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Faktur</title>
</head>
<body>
    <h1>Faktur</h1>
    <form class="m-5" method="POST" action="{{route('storeProd')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="shippingAddress" class="form-label">Shipping Address</label>
            <input type="text" class="form-control" id="shippingAddress" aria-describedby="emailHelp" name="shippingAddress">
        </div>
        <div class="mb-3">
            <label for="postalCode" class="form-label">Postal Code</label>
            <input type="text" class="form-control" id="postalCode" aria-describedby="emailHelp" name="postalCode">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>