<div class="absolute top-4 left-4">
    <button wire:click="toggleFavorite">
        @if ($isFavorite)
            <img src="images/favorite_black_24dp.svg" alt="favorito">
        @else
            <img class="hover:bg-blue-300 rounded" src="images/favorite_border_black_24dp.svg" alt="">
        @endif
    </button>
</div>
