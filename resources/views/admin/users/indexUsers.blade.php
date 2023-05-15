<x-layout>
    <x-slot:tittle>Lista Usuarios</x-slot:tittle>
    <div class="w-full flex flex-col items-center">
        <div class="w-3/5 bg-gray-200 rounded-tl-lg rounded-tr-lg flex justify-center border p-4">
            <input id="searchInput" placeholder="¿A quien buscas?" class="bg-white w-full items-center p-2">
        </div>
        <div id="userListContainer" class="w-full flex justify-center p-0">
            <table class="w-3/5 text-center border">
                <thead class="bg-gray-200 rounded-tl-lg">
                    <tr>
                        <th class="p-4">ID</th>
                        <th class="p-4">Nombre</th>
                        <th class="p-4">Email</th>
                        <th class="p-4"></th>
                    </tr>
                </thead>
            <tbody  class="bg-white dark:bg-darker">
                @foreach ( $users as $user)
                <tr class="user-item {{ $loop->iteration % 2 == 0 ? 'bg-white-200 ' : 'bg-gray-100' }}">
                    <td class="p-2">{{$user->id}}</td>
                    <td class="p-2">{{$user->name}}</td>
                    <td class="p-2">{{$user->email }}</td>
                    <td class="p-2"><a href="/admin/users/{{$user->id}}/edit"><span class="transition duration-300 ease-in-out material-symbols-rounded hover:bg-primary rounded-lg p-2">
                        edit
                        </span> </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
    </div>
</x-layout>
<script>
    const searchInput=document.getElementById('searchInput');
    const userListContainer = document.getElementById('userListContainer');
    const userItems=userListContainer.getElementsByClassName('user-item');
    searchInput.addEventListener('input', function(){
        const searchValue = searchInput.value.toLowerCase();
        Array.from(userItems).forEach(function(user){
            const userName = user.textContent.toLowerCase();
            if(userName.includes(searchValue)){
                user.style.display = 'table-row'; //Mostrar usuario
            }else{
                user.style.display = 'none'; //Ocultar usuario
            }
        });
    });
</script>
