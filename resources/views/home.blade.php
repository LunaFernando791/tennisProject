<x-layout>
    <x-slot:tittle>Step Up Style</x-slot:tittle>
    <div class="text-center my-4 flex flex-col items-center">
        <img src="images/logoStep.png" class="w-50 h-50" alt="Logo Step Up Style">
        <p class="text-gray-600 text-xl">Eleva tu estilo con nuestra colección de calzado único.</p>
        <h2 class="intems-center uppercase text-2xl font-bold text-gray-800 py-4">Nuestras Marcas</h2>
    </div>
    <div class="flex flex-wrap w-full justify-center items-center">
        @if(!$marcas->isEmpty())
            @foreach ($marcas as $marca)
            <div class="bg-white shadow-lg p-4 flex flex-col items-center rounded-lg m-4 transform transition-transform duration-300 hover:scale-105">
                <div class="w-28 h-28 m-4 flex items-center justify-center">
                    <a href="{{ route('tennis.marca', ['marca' => $marca->id]) }}">
                        <img src="{{ asset('storage/' . $marca->imagen) }}" alt="Logo de {{ $marca->name }}">
                    </a>
                </div>
            </div>
            @endforeach
        @else
            <h3>No hay marcas disponibles por el momento.</h3>
        @endif
    </div>
    <section class="bg-gray-200 py-12 bg-opacity-50 rounded-lg">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">Algunos de nuestros productos</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                <div class="relative bg-gray-300 rounded shadow-lg overflow-hidden">
                    <img src="images/botas.png" class="w-full h-64 object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex justify-center items-center opacity-0 hover:opacity-100 transition duration-300">
                        <a href="/tennis" class="text-white text-lg font-bold bg-gray-400 px-6 py-3 rounded hover:bg-gray-500">Ver calzado</a>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Botas</h3>
                        <p class="text-gray-800">Botas de diversas marcas de calidad.</p>
                        <div class="mt-6 flex justify-between items-center">
                            <span class="text-2xl font-bold text-blue-500"></span>
                        </div>
                    </div>
                </div>
                <div class="relative bg-gray-300 shadow-lg overflow-hidden">
                    <img src="images/sneakers.png" class="w-full h-64 object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex justify-center items-center opacity-0 hover:opacity-100 transition duration-300">
                        <a href="/tennis" class="text-white text-lg font-bold bg-gray-400 px-6 py-3 rounded hover:bg-gray-500">Ver calzado</a>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Sneakers</h3>
                        <p class="text-gray-800">Los sneakers más modernos y con el mejor estilo.</p>
                        <div class="mt-6 flex justify-between items-center">
                            <span class="text-2xl font-bold text-blue-500"></span>
                        </div>
                    </div>
                </div>
                <div class="relative bg-gray-300 shadow-lg overflow-hidden">
                    <img src="images/zapatos.png" class="w-full h-64 object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex justify-center items-center opacity-0 hover:opacity-100 transition duration-300">
                        <a href="/tennis" class="text-white text-lg font-bold bg-gray-400 px-6 py-3 rounded hover:bg-gray-500">Ver calzado</a>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Zapatos</h3>
                        <p class="text-gray-800">Los más elegantes y modernos que puedas encontrar.</p>
                        <div class="mt-6 flex justify-between items-center">
                            <span class="text-2xl font-bold text-blue-500"></span>
                        </div>
                    </div>
                </div>
                <div class="relative bg-gray-300 shadow-lg overflow-hidden">
                    <img src="images/sandalias.png" class="w-full h-64 object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex justify-center items-center opacity-0 hover:opacity-100 transition duration-300">
                        <a href="/tennis" class="text-white text-lg font-bold bg-gray-400 px-6 py-3 rounded hover:bg-gray-500">Ver calzado</a>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Sandalias</h3>
                        <p class="text-gray-800">Los calzados más frescos para el verano, aquí los tenemos.</p>
                        <div class="mt-6 flex justify-between items-center">
                            <span class="text-2xl font-bold text-blue-500"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-gray-100 py-10">
        <div class="container mx-auto">
          <div class="flex flex-col md:flex-row items-center">
            <div class="md:w-1/2">
              <h2 class="text-3xl font-bold mb-4">Bienvenido a nuestra tienda</h2>
              <p class="text-gray-700 mb-6">Bienvenido a nuestra tienda de calzado, donde encontrarás una amplia selección de productos de zapatos de alta calidad. Nos enorgullece ofrecer una variedad de raquetas, zapatillas, accesorios y ropa de tenis de las mejores marcas del mercado.</p>
              <p class="text-gray-700 mb-6">Nuestro objetivo es satisfacer las necesidades de todos tipo de personas. Trabajamos arduamente para ofrecer productos que se adapten a diferentes estilos y preferencias personales.</p>
              <p class="text-gray-700 mb-6">Explora nuestra tienda en línea o visítanos en nuestra ubicación física. ¡Esperamos ayudarte a encontrar los mejores productos para ti!</p>
            </div>
          </div>
        </div>
      </section>
</x-layout>
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

