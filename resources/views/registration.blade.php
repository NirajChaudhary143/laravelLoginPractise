<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="{{route('userRegister')}}" method="POST">
        @csrf
        @if(Session::has('success'))
            {{Session::get('success')}}
        @endif
        @if(Session::has('fail'))
            {{Session::get('fail')}}
        @endif

        <br><input type="text" name="name" placeholder="Enter name" value="{{old('name')}}"><br>
        @error('name')
        {{$message}}

        @enderror
        <br>
        <input type="email" name="email" placeholder="Enter email" value="{{old('email')}}"><br>
        @error('email')
        {{$message}}

        @enderror
        <br><input type="password" name="password" placeholder="enter your password"><br>
        @error('password')
        {{$message}}

        @enderror
        <br><input type="submit" name="submit" id="" value="Register">
    </form>
</body>
</html>