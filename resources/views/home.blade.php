<x-layout>
    <x-slot:tittle>Nuestras Marcas</x-slot:tittle>
    <div class="flex flex-wrap w-full justify-center items-center">
        @foreach ($marcas as $marca)
        <div class="bg-white shadow-lg p-4 flex flex-col items-center rounded-lg m-4 transform transition-transform duration-300 hover:scale-105">
            <div class="w-28 h-28 m-4 flex items-center justify-center">
                <a href="{{ route('tennis.marca', ['marca' => $marca->id]) }}">
                    <img src="{{ asset('storage/' . $marca->imagen) }}" alt="Logo de {{ $marca->name }}">
                </a>
            </div>
        </div>
        @endforeach
      </div>
</x-layout>
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

