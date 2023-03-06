<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <h1>Detalle del producto</h1>
        <h3>{{$calzado->modelo}}</h3>
        <h3>{{$calzado->precio}}</h3>
        <br>
        <form action="{{ route('tennis.destroy', $calzado)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Eliminar</button>
        </form>
    </body>
</html>
