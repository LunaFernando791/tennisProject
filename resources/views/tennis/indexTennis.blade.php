<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <h1>Tennis</h1>
        <ul>
        @foreach ( $tennis as $ten)
            <li>{{$ten->modelo}} - {{$ten->precio}}</li>
        @endforeach
        </ul>
    </body>
</html>
