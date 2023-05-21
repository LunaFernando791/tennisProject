
<x-layout>
    <x-slot:tittle>Calzado</x-slot:tittle>
    @can('Admin', App\Models\User::class)  <!-- Si no se es usuario administrador, ciertos elementos no pueden verse-->
        <div class="addCalz">
            <a href="/tennis/create">Agregar producto</a>
        </div>
    @endcan
    @if(!$tennis->isEmpty())
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 m-4">
            @foreach($tennis as $ten)
                <div class="max-w-sm bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="relative">
                        <livewire:favorite-button :calzado-id="$ten->id" :is-favorite="$ten->isFavorite()"/>
                    </div>
                    <img src="{{ asset('storage/'.$ten->imagen) }}" alt="Imagen del calzado" class="w-full h-64 object-cover">
                    <div class="p-4">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-lg font-bold mb-2 h-15">{{ $ten->modelo }}</h2>
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
    @else
        <div class="flex items-center justify-center w-full">
            <h2 class="text-center font-bold text-primary">No hay calzado a la venta de momento</h2>
        </div>
    @endif
</x-layout>
@if (session('eliminar')=='ok') <!-- Muestra la alerta de confirmación de eliminación..-->
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
<script>
    document.querySelectorAll('[id^="miBoton_"]').forEach(function(button) {
    button.addEventListener('click', function() {
        var valor = this.dataset.valor;
        window.livewire.emit('agregarAlCarrito', valor);
        });
    });
</script>
