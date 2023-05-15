<x-layout>
    <x-slot:tittle>Nuestras Marcas</x-slot:tittle>
    <div class="flex w-full justify-center">
        <!-- Carta 1 -->
        <div class="bg-white shadow-lg p-4 mr-4 w-1/6 overflow-y-auto whitespace-normal">

        </div>

        <!-- Carta 2 -->
        <div class="bg-white shadow-lg p-4 mr-4 w-1/6">
          <!-- Contenido de la carta -->
        </div>

        <!-- Carta 3 -->
        <div class="bg-white shadow-lg p-4 mr-4 w-1/6">
          <!-- Contenido de la carta -->
        </div>
      </div>
</x-layout>
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

