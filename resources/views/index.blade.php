<x-app-layout>
    <div class="py-12 bg-img homepage-bg">
        @if (auth()->user()->is_complete == 0)
        <x-incomplete />
        @endif
    </div>
</x-app-layout>
