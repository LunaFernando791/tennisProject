<div>
    <div class="card">
        <div class="card-header w-full bg-gray-200 rounded-tl-lg rounded-tr-lg flex justify-center border p-4">
                <input wire:model="search" placeholder="¿A quien buscas?" class="bg-white w-full items-center p-2">
        </div>
        @if ($users->count())
        <div class="card-body mb-2 border">
            <table class="w-full text-center border rounded-lg">
                <thead class="bg-gray-200 rounded-tl-lg">
                    <tr>
                        <th class="p-4">ID</th>
                        <th class="p-4">Nombre</th>
                        <th class="p-4">Email</th>
                        <th class="p-4"></th>
                    </tr>
                </thead>
                <tbody  class="bg-white dark:bg-darker ">
                    @foreach ( $users as $user)
                        <tr class="user-item {{ $loop->iteration % 2 == 0 ? 'bg-white-200 ' : 'bg-gray-100' }}">
                            <td class="p-2">{{$user->id}}</td>
                            <td class="p-2">{{$user->name}}</td>
                            <td class="p-2">{{$user->email }}</td>

                            <td class="p-2"><a href="/users/{{$user->id}}/edit"><span class="transition duration-300 ease-in-out material-symbols-rounded hover:bg-primary rounded-lg p-2">
                                edit
                                </span> </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mb-4">
            {{ $users->links() }}
        </div>
        @else
            <div>
                <strong>No hay registros</strong>
            </div>
        @endif
    </div>
</div>
