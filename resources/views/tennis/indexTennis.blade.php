
<x-layout>
    <x-slot:tittle>Calzado</x-slot:tittle>
    @can('Admin', App\Models\User::class)
        <div class="addCalz">
            <a href="/tennis/create">Agregar producto</a>
        </div>
    @endcan
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach($tennis as $ten)
            <div class="max-w-sm bg-white shadow-md rounded-lg overflow-hidden">
                <div class="relative">
                    <button class="bg-transparent absolute top-2 right-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-red-500 hover:text-red-600 h-6 w-6">
                            <path d="M10 18l-1.426-1.283C3.962 12.375 1 9.656 1 6.5 1 3.42 3.42 1 6.5 1c1.744 0 3.467.792 4.5 2.148C11.033 1.792 12.756 1 14.5 1 17.58 1 20 3.42 20 6.5c0 3.156-2.962 5.875-8.574 10.217L10 18z" />
                        </svg>
                    </button>
                </div>
                <img src="{{ asset('storage/'.$ten->imagen) }}" alt="Imagen del calzado" class="w-full h-64 object-cover">
                <div class="p-4">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-bold mb-2 h-20">{{ $ten->modelo }}</h2>
                        <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Añadir al carrito</button>
                    </div>
                    <p class="text-gray-600 mt-4">${{ $ten->precio }}</p>
                </div>
                <div class="bg-gray-100 px-4 py-2">
                    <a href="{{ route('tennis.show', $ten->id) }}" class="text-blue-500 hover:text-blue-600 font-bold">Ver en detalle</a>
                    @can('Admin', App\Models\User::class)
                        <a href="/calzados/{{$ten->id}}/edit">
                            <span class="material-symbols-sharp">
                                edit
                            </span>
                        </a>
                    @endcan
                </div>
            </div>
        @endforeach
    </div>

</div>
</x-layout>
@if (session('eliminar')=='ok') <!-- Muestra la alerta de confirmación de eliminación.-->
    <script>
        Swal.fire(
            'Eliminado!',
            'Tu elemento ha sido eliminado.',
            'success'
        );
    </script>
@endif
@if (session('creado')=='ok') <!-- Muestra la alerta de confirmación de guardado.-->
    <script>
        Swal.fire(
            'Guardado!',
            'Tu elemento ha sido guardado correctamente.',
            'success'
        );
    </script>
@endif
