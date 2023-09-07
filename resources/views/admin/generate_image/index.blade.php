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
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Image Generator Using Open AI API and Laravel</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('image.image_show')}}" method="post" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label for="desc" class="form-label">Image anything and write down
                                here</label>
                            <input type="text" class="form-control" @error('desc') is-invalid @enderror name="desc"
                                   id="desc" placeholder="A blue sky with birds" required maxlength="1000">
                            @error('desc')
                                Please provide a valid description
                            @enderror
                        </div>
                        <div class="mb-3">
                            <select class="custom-select" @error('size') is-invalid @enderror name="size">
                                <option selected>Select size</option>
                                <option value="sm" @if(old('size') === 'sm') selected @endif>Small</option>
                                <option value="md" @if(old('size') === 'md') selected @endif >Medium</option>
                                <option value="lg" @if(old('size') === 'lg') selected @endif>Large</option>
                            </select>
                            @error('size')
                            <div class="invalid-feedback">
                                Please provide a valid size
                            </div>
                            @enderror
                        </div>
                        <button class="btn btn-secondary mt-2 mb-3 w-100">Generate image</button>
                        <a href="{{ route('home') }}" class="btn btn-primary mb-3 w-100">Back to Home</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
