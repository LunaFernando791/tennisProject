<x-layout>
    <x-slot:tittle>Detalle del producto</x-slot:tittle>
    <div class= "bg-white shadow rounded-lg m-4 ml-20">
        <div class="px-4 py-6 sm:px-6">
            <h3 class="text-xl font-semibold leading-6 text-gray-900">{{ $calzado->marca }}</h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500"> {{$calzado->modelo}}</p>
        </div>
        <div class="border-t border-gray-200">
            <div class="flex items-center justify-between bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 flex-wrap">
                <div class="mt-4">
                <img class="rounded-lg h-64 p-0 m-1 items-center" src="{{ asset('storage/app/public/'.$rutaImagen) }}" alt="{{ $calzado->modelo }}">
                </div>
                <div class="mt-4">
                    <dl>
                        <dt class="text-sm font-medium text-gray-500">Precio</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">${{ $calzado->precio }}</dd>
                        <dt class="text-sm font-medium text-gray-500">Detalles</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $calzado->detalle }}</dd>
                    </dl>
                </div>
            </div>
            <form class="formulario-eliminar" action="{{ route('tennis.destroy', $calzado)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                         class="bg-[#D64937] inline-block rounded p-2 m-8 text-xs hover:bg-[#f3f4ff] hover:text-[#D64937]">
                        Eliminar
                </button>
            </form>
        </div>
    </div>

</x-layout>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.querySelector('.formulario-eliminar').addEventListener('submit', function(e) {
    e.preventDefault();
Swal.fire({
title: 'Estas seguro?',
text: "Esta imagen se eliminara definitivamente",
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: 'Si, eliminar definitivamente!',
cancelButtonText: 'Cancelar',
}).then((result) => {
if (result.isConfirmed) {
    this.submit();
}
})
})
</script>
@if(session('editado')=='ok')
<script>
    Swal.fire('Saved!', '', 'success')
</script>
@endif
