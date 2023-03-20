<x-layout>
        <x-slot:tittle>Detalle del producto</x-slot:tittle>
        <h3>{{$calzado->modelo}}</h3>
        <h3>{{$calzado->precio}}</h3>
        <br>
        <form action="{{ route('tennis.destroy', $calzado)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Eliminar</button>
        </form>
</x-layout>
