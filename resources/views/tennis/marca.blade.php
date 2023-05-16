<x-layout>
    <x-slot:tittle>Calzado de Converse</x-slot:tittle>
    @foreach ($calzados as $calzado )
        <p>{{ $calzado->marca->name }}</p>
        <p>{{ $calzado->modelo }}</p>
    @endforeach
</x-layout>
