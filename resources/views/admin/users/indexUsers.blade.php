<x-layout>
    <x-slot:tittle>Lista Usuarios</x-slot:tittle>
    <div class="flex flex-col items-center">
        <div>
        <table class=" border-separated border border-slate-500 bg-primary dark:bg-darker">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th></th>
              </tr>
            </thead>
            <tbody  class="bg-white dark:bg-darker">
                @foreach ( $users as $user)
                <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-white-200 ' : 'bg-gray-200' }}">
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email }}</td>
                    <td width="10px"><a href="/admin/users/{{$user->id}}/edit"><span class="material-symbols-rounded">
                        edit
                        </span> </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <div class="flex justify-center items-center p-4 m-4">{{$users->links('vendor.pagination.tailwind') }}</div>
    </div>
</x-layout>
