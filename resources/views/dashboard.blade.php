
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>

            <th>Name</th>
            <th>email</th>
            <th>Action</th>
        </tr>
        <tr>
            <td>{{$data->name}}</td>
            <td>{{$data->email}}</td>
            <td><a href="{{route('logout')}}">LogOut</a></td>
        </tr>
    </table>
</body>
</html>