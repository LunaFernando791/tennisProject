<div>
    <ul>
        @if(auth()->check())
            @foreach ($favoritos as $favorito)
                <li>{{ $favorito->marca->name }}</li>
            @endforeach
        @else
            <div class="flex flex-col items-center">
                <h2>No hay nada que mostrar por aquí</h2>
                <a class="rounded-lg border bg-blue-100 hover:bg-blue-300 p-2 m-2" href="/login">Registrate o inicia sesión!</a>
            </div>
        @endif
    </ul>
</div>
