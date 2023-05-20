<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('loggedIn')}}" method="POST">
    @if(Session::has('fail'))
            {{Session::get('fail')}}
        @endif
        @csrf
<br><input type="email" name="email" value="{{old('email')}}" placeholder="Email"><br>
@error('email')
        {{$message}}

        @enderror
        <br>
<input type="password" name="password" id=""><br>
@error('password')
        {{$message}}

        @enderror
<input type="submit" value="Login">

    </form>
</body>
</html>