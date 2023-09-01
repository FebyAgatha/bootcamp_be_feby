<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Show Category</title>
</head>
<body>
    <div class="d-flex m-5">
    @foreach ($categories as $category)
        <div class="card m-5" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{$category->category}}</h5>
                <a href="{{route('categoryDetail', ['id'=>$category->id])}}" class="btn btn-primary">See More Detail</a>
                <div class="mt-1">
                    <a href="{{route('editCat', ['id'=>$category->id])}}" class="btn btn-success">Update</a>
                    <form action="{{route('deleteCat', ['id'=>$category->id])}}" method="POST"  class="mt-1">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>