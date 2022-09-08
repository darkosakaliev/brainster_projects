<x-app-layout>
    <div class="p-12 overflow-auto custom-lightgray bg-img">
        @if (auth()->user()->is_complete == 0)
            <div class="mb-6">
                <x-incomplete />
            </div>
        @endif
        <div class="flex flex-col xl:flex-row">
            <div class="basis-full xl:basis-1/2">
                <div class="flex flex-col md:flex-row md:space-x-20">
                    <img class="w-72 h-72 rounded-full border-8 border-white object-cover"
                        src="{{ asset('profile-images/' . $user->profile_image) }}" alt="">
                    <div class="flex flex-col justify-center">
                        <span class="text-2xl font-semibold custom-gray">Name:</span>
                        <span class="text-3xl font-semibold mb-8">{{ $user->name }} {{ $user->surname }}</span>
                        <span class="text-2xl font-semibold custom-gray">Contact:</span>
                        <span class="text-xl font-semibold mb-8">{{ $user->email }}</span>
                    </div>
                </div>
            </div>
            <div class="basis-1/2">
                <div class="flex flex-col mb-4 mt-12 justify-center">
                    <span class="text-2xl font-semibold mb-2 custom-gray">Biography:</span>
                    <p class="mb-6 custom-gray show-read-more">{{ $user->bio }}</p>
                    <span class="text-2xl font-semibold">Skills:</span>
                    <div class="w-full mt-4">
                        <div class="flex overflow-y-scroll flex-wrap">
                            @foreach ($user->skills as $skill)
                                <div>
                                    <div
                                        class="w-28 h-28 mt-1 mr-1 text-center text-xs grid place-items-center font-semibold bg-white rounded-xl">
                                        {{ $skill->name }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ url()->previous() }}" class="mt-12 xl:mt-44 inline-block custom-bg-green px-24 py-3 text-white rounded-lg">Back</a>
    </div>
</x-app-layout>
