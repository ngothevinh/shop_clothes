<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{route('blog_generate')}}" method="POST">
    @csrf
    <label for="">Create 5 fake news topic about</label><br><br>
    <input type="text" name="topic" placeholder="fake news topic"><br><br>
    <button>Generate</button>
</form>
@if(isset($result))
    <h3>Output:</h3>
    <div style="white-space: pre-line">{{$result}}</div>
@endif

</body>
</html>
