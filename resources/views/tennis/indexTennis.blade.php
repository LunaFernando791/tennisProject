
<x-layout>
    <x-slot:tittle>Calzado</x-slot:tittle>
    <div class="addCalz">
        <a href="/tennis/create">Agregar producto</a>
    </div>
    <div class="container">
        <table class=" border-separated border border-slate-500 bg-primary dark:bg-darker">
            <thead class="">
              <tr>
                <th>Modelo</th>
                <th>Precio</th>
                <th>Ver detalles</th>
                <th>Editar producto</th>
              </tr>
            </thead>
            <tbody  class="bg-white dark:bg-darker">
                @foreach ( $tennis as $ten)
                <tr>
                    <td>{{$ten->modelo}}</td>
                    <td>${{$ten->precio}}</td>
                    <td><a href="/tennis/{{$ten->id}}"><span class="material-symbols-sharp">
                        info
                        </span></a></td>
                    <td><a href="/tennis/{{$ten->id}}/edit"><span class="material-symbols-sharp">
                        edit
                        </span></a></td>
                </tr>
                @endforeach
            </tbody>
          </table>
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
