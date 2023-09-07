<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Generate image AI</title>
    <style>
        .card {
            background-image: linear-gradient(to top, #a8edea 0, #fed6e3 100%);
        }
    </style>
</head>
<body>
    <section class="text-center">
        <div class="container mt-5">
            <div class="card-header text-center" style="margin-bottom: 50px">
                <h4>{{$description}}</h4>
            </div>
            <div class="row justify-content-center" style="margin-bottom: 30px">
                <div class="col col-md-4">
                    <h5>Image 1</h5>
                    <figure>
                        <img src="{{$image1}}" alt="{{$description}}" class="img-thumbnail">
                    </figure>
                </div>
                <div class="col col-md-4">
                    <h5>Image 2</h5>
                    <figure>
                        <img src="{{$image2}}" alt="{{$description}}" class="img-thumbnail">
                    </figure>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <button class="btn btn-secondary" onclick="window.location.reload()">Regenerate Image</button>
            <a href="{{ route('image_generate') }}" class="btn btn-danger ml-3">Back</a>
        </div>
    </section>
</body>
</html>
