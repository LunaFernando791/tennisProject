
<x-layout>
    <x-slot:tittle>Calzado</x-slot:tittle>
    @can('Admin', App\Models\User::class)
        <div class="addCalz">
            <a href="/tennis/create">Agregar producto</a>
        </div>
    @endcan
    <div class="w-full flex flex-col items-center">
        <div class="w-3/5 bg-gray-200 rounded-tl-lg rounded-tr-lg flex justify-center border p-4">
            <input placeholder="¿Que calzado buscas?" class="bg-white w-full items-center p-2">
        </div>
        <div class="w-full flex justify-center p-0">
            <table class="w-3/5 text-center border">
                <thead class="bg-gray-200 rounded-tl-lg">
                    <tr>
                        <th class="p-4">Modelo</th>
                        <th class="p-4">Precio</th>
                        <th class="p-4">Detalles</th>
                        @can('Admin', App\Models\User::class)  <!-- Solo administradores pueden editar elementos.-->
                        <th class="p-4">Editar</th>
                        @endcan
                    </tr>
                </thead>
            <tbody  class="bg-white dark:bg-darker">
                @foreach ( $tennis as $ten)
                <tr>
                    <td class="p-2">{{$ten->modelo}}</td>
                    <td class="p-2">${{$ten->precio}}</td>
                    <td class="p-2"><a href="/tennis/{{$ten->id}}"><span class="material-symbols-sharp">
                        info
                        </span></a></td>
                        @can('Admin', App\Models\User::class)
                            <td class="p-2"><a href="/tennis/{{$ten->id}}/edit">
                                <span class="material-symbols-sharp">
                                    edit
                                </span></a>
                            </td>
                        @endcan
                </tr>
                @endforeach
            </tbody>
        </table>
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
