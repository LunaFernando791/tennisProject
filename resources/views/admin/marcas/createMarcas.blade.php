<x-layout>
    <div class="formularioCreate">
        <x-slot:tittle>Agregar Nueva Marca</x-slot:tittle>
        <form class="w-full max-w-sm px-4 py-6 space-y-6 bg-white rounded-md dark:bg-darker" action="/marcas" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="name">
                <input class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker"
                    type="text", name="name" id="name" placeholder="Nombre marca" value="{{old('name')}}" required>
                <br>
                @error('name')
                    <h5>{{ $message}}</h5>
                @enderror
            </label>
            <label for="imagen">
                <p class="text-gray-500 py-2">Logo o imagen de la marca</p>
                <input required type="file" name="imagen" id="imagen" class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker">
                @error('imagen')
                    <h5>{{ $message }}</h5>
                @enderror
                <br>
                <br>
            </label>
            <label>
                <button class="w-full px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-[#1C9CEA] hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1"
                type="submit" value="Enviar">ENVIAR</button>
            </label>
        </form>
    </div>
</x-layout>
<script>
    document.querySelector('.formularioCreate').addEventListener('submit', function(e) {
        e.preventDefault();
    Swal.fire({
    title: 'Estas seguro de guardar?',
    text: "¿Has llenado bien toda la información?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, guardar!',
    cancelButtonText: 'Cancelar',
    }).then((result) => {
    if (result.isConfirmed) {
        e.target.submit();
    }
    })
    })
</script>
