<x-layout>
    <x-slot:tittle>Editar Tennis</x-slot:tittle>
    <div class="formulario-editar flex justify-center items-center h-screen">
        <form class="w-full max-w-sm px-4 py-6 space-y-6 bg-white rounded-md dark:bg-darker" action="{{ route('tennis.update', $calzado)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <label for="marca_id">Marca
                <select name="marca_id" id="marca_id" class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary dark:focus:ring-primary-darker">
                    @foreach ($marcas as $marca)
                        <option value="{{ $marca->id }}" {{ old('marca_id' ?? $calzado->marca->id == $marca->id ? 'selected' : '') }}>
                            {{ $marca->name }}
                        </option>
                    @endforeach
                </select>
                <br>
                @error('marca_id')
                    <h5>{{ $message }}</h5>
                @enderror
                <br>
            </label>
            <label for="modelo">Modelo<input type="text" name="modelo" id="modelo" value="{{old('modelo') ?? $calzado->modelo}}"
                class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary dark:focus:ring-primary-darker">
            <br>
            @error('modelo')
                <h5>{{ $message }}</h5>
            @enderror
            <br>
            </label>
            <label for="precio">Precio
                <input type="text" name="precio" id="precio" value="{{old('precio') ?? $calzado->precio}}"
                class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary dark:focus:ring-primary-darker">
                <br>
            @error('precio')
                <h5>{{ $message }}</h5>
            @enderror
            <br>
            </label>
            <label for="detalle">Modelo
                <textarea rows="5" cols="50" type="text"
                            name="detalle" id="detalle"
                            value="{{old('detalle')}}"
                            class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker">
                    {{old('detalle') ?? $calzado->detalle}}
                </textarea>
                <br>
                @error('detalle')
                    <h5>{{ $message }}</h5>
                @enderror
                <br>
                </label>
            <label for="imagen">
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
    document.querySelector('.formulario-editar').addEventListener('submit', function(e) {
        e.preventDefault();
    Swal.fire({
    title: 'Quieres guardar los cambios?',
    showDenyButton: true,
    confirmButtonText: 'Guardar',
    denyButtonText: 'No guardar',
    }).then((result) => {
    if (result.value) {
        e.target.submit();
    } else if (result.isDenied) {
        Swal.fire('Changes are not saved', '', 'info')
    }
    })
    })
</script>
