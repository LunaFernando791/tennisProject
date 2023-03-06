<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <h1>Agregar Nuevo Tennis</h1>
        <form action="/tennis" method="POST">
        @csrf
            <label for="modelo">Modelo<input type="text", name="modelo" id="modelo" value="{{old('modelo')}}">
            <br>
            @error('modelo')
                <h5>{{ $message}}</h5>
            @enderror
            <br>
            </label>
            <label for="precio">Precio
                <input type="text" name="precio" id="precio" value="{{old('precio')}}">
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
<!-- route - 'tennis.store', $ten -->
