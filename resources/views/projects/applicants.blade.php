<x-app-layout>
    <div class="overflow-auto py-12 bg-img custom-lightgray">
        @if (auth()->user()->is_complete == 0)
            <x-incomplete />
        @else
            <div class="flex ml-12">
                <div class="flex flex-col">
                    <p class="text-2xl font-semibold mb-4">{{ $project->name }} - Applicants</p>
                    <div class="flex items-center">
                        <p class="text-xl font-semibold mb-4">Choose your teammates</p>
                        <img class="w-10 h-10 ml-12 mt-6" src="{{ asset('ikons/4.png') }}" alt="">
                    </div>
                </div>
                <div class="ml-auto mr-12 text-center">
                    <form action="{{ route('projects.assemble', $project->id) }}" method="POST">
                        @csrf
                        <p class="text-sm custom-gray">Ready to start?</p>
                        <p class="text-sm custom-gray mb-4">Click on the button below.</p>
                        <button type="submit" class="text-sm flex text-md custom-bg-orange text-white px-4 py-2 rounded-lg">TEAM
                            ASSEMBLED &#10004;
                        </button>
                    </form>
                </div>
            </div>
            <div class="max-w-6xl mt-12 flex flex-wrap mx-auto">
                @foreach ($applications as $application)
                    <div class="basis-1/3 mx-auto p-2">
                        <div
                            class="bg-white p-6 shadow-sm rounded-2xl mt-20 relative {{ $application->is_accepted == 1 ? 'accepted-bg' : '' }}">
                            <div class="flex justify-center text-center relative">
                                <div class="flex flex-col justify-center items-center">
                                    <div class="absolute -top-28 border-8 border-white rounded-full">
                                        <img class="rounded-full w-36 h-36 object-cover"
                                            src="{{ asset('profile-images/' . $application->user->profile_image) }}"
                                            alt="">
                                    </div>
                                    <a href="{{ route('users.show', $application->user->id) }}"
                                        class="text-lg font-bold mt-14">{{ $application->user->name }}
                                        {{ $application->user->surname }}</a>
                                    <p class="text-md font-semibold custom-orange mb-1">
                                        {{ $application->user->academy->profession }}</p>
                                    <p class="text-sm mb-3">{{ $application->user->email }}</p>
                                    <p class="font-semibold mb-6">{{ $application->description }}</p>
                                    <button class="approveButton" data-id="{{ $application->id }}"
                                        {{ $application->is_accepted == 1 ? 'disabled' : '' }}><img class="w-8 h-8"
                                            src="{{ asset('ikons/1.png') }}" alt=""></button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
