<x-layout>
    <x-slot:tittle>Asignar un rol</x-slot:tittle>
    <div class="flex justify-center">
        <div class="w-3/4 bg-gray-200 rounded-lg p-4">
            <div class="w-full bg-gray-100 p-2 rounded border">
                <p class="text-blue-600 text-lg font-bold ">Nombre:</p>
                <p class="border p-2 text-sm rounded">{{ $user->name }}</p>
                <form action="{{ route('admin.users.update', $user)}}" method="POST" class="text-sm ">
                    @csrf
                    @method('PUT')
                    @foreach ($roles as $role )
                        <div class="m-2">
                            <label>
                                <input class="mx-2" type="radio" name="role_id[]" value="{{ $role->id }}" {{ $user->hasRole($role) ? 'checked' : '' }}>{{ $role->name }}
                            </label>
                        </div>
                    @endforeach
                    <button class="my-2 px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-[#1C9CEA] hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1"
                        type="submit" value="Enviar">Asignar rol</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
@if(session('rolAsignado')=='ok')
<script>
    Swal.fire('Rol asignado correctamente!', '', 'success')
</script>
@endif
