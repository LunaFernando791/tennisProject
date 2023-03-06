<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <h1>Editar Tennis</h1>
        <form action="{{ route('tennis.update', $calzado)}}" method="POST">
        @csrf
        @method('PATCH')
            <label for="modelo">Modelo<input type="text", name="modelo" id="modelo" value="{{old('modelo') ?? $calzado->modelo}}">
            <br>
            @error('modelo')
                <h5>{{ $message }}</h5>
            @enderror
            <br>
            </label>
            <label for="precio">Precio
                <input type="text" name="precio" id="precio" value="{{old('precio') ?? $calzado->precio}}">
                <br>
            @error('precio')
                <h5>{{ $message }}</h5>
            @enderror
            <br>
            </label>
            <label>
                <button type="submit" value="Enviar">ENVIAR</button>
            </label>
        </form>
    </body>
</html>
