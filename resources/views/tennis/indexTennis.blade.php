
    <x-layout>
        <x-slot:tittle>Calzado</x-slot:tittle>
        <div class="addCalz">
            <a href="/tennis/create">Agregar producto</a>
        </div>
            <div class="container">
            <table class=" border-separated border border-slate-500 bg-primary-50">
                <thead class="header">
                  <tr>
                    <th>Modelo</th>
                    <th>Precio</th>
                    <th>Ver detalles</th>
                    <th>Editar producto</th>
                  </tr>
                </thead>
                <tbody id="lista-calzado" class="bg-primary-100">
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
        </x-layout>


