<x-app-layout>
    <div class="overflow-auto py-12 bg-img applications-bg">
        @if (auth()->user()->is_complete == 0)
        <x-incomplete />
        @endif
    </div>
</x-app-layout>
