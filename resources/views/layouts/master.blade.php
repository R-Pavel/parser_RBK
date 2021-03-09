<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
@if(isset($errors) && $errors->any())
    <div class="alert alert-danger">
        <ul>
           @foreach($errors->all() as $item)
                <li>{{$item}}</li>
           @endforeach
        </ul>
    </div>
@endif
@if(session()->has('success'))
    <div class="alert alert-success">
        {{session()->get('success')}}
    </div>
@endif
@yield('content')
</body>
</html>
