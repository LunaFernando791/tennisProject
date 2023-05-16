<x-layout>
    <x-slot:tittle>Lista Marcas</x-slot:tittle>
    @can('Admin', App\Models\User::class)
        <div class="addCalz">
            <a href="{{ route('admin.marcas.create') }}">Agregar marca</a>
        </div>
    @endcan
    <div class="w-full flex flex-col items-center">
        <div id="userListContainer" class="w-full flex justify-center p-0">
            <div class="w-3/5 text-center">
                @livewire('marca-index')
            </div>
        </div>
    </div>
</x-layout>
@if (session('creado')=='ok') <!-- Muestra la alerta de confirmación de guardado.-->
    <script>
        Swal.fire(
            'Guardado!',
            'Tu elemento ha sido guardado correctamente.',
            'success'
        );
    </script>
@endif
