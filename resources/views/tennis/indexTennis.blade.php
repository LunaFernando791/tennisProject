
    <x-layout>
        <x-slot:tittle>Lista de tennis</x-slot:tittle>
        <a href="/tennis/create">Agregar Tennis</a>
        <ul>
        @foreach ( $tennis as $ten)
            <li>{{$ten->modelo}} - {{$ten->precio}}
            <a href="/tennis/{{$ten->id}}">Ver detalle(SHOW)</a></li>
            <a href="/tennis/{{$ten->id}}/edit">Editar producto</a>
        @endforeach
        </ul>
    </x-layout>
