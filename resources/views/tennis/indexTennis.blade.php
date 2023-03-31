
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
                <tbody class="bg-primary-100">
                    @foreach ( $tennis as $ten)
                    <tr>
                        <td>{{$ten->modelo}}</td>
                        <td>${{$ten->precio}}</td>
                        <td class="detail"><a href="/tennis/{{$ten->id}}"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                        </svg></a></td>
                        <td><a href="/tennis/{{$ten->id}}/edit">Editar producto</a></td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
        </x-layout>


