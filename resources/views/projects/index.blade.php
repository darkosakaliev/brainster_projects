<x-app-layout>
    <div class="overflow-auto py-12 bg-img projects-bg">
        @if (auth()->user()->is_complete == 0)
            <x-incomplete />
        @else
            <div class="ml-12">
                <p class="font-semibold mb-4">Have a new idea to make the world better?</p>
                <div class="flex">
                    <p class="text-2xl font-semibold mr-4">Create a new project</p>
                    <a href="{{ route('projects.create') }}">
                        <img class="w-8 h-8" src="{{ asset('ikons/1.png') }}" alt="">
                    </a>
                </div>
            </div>
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                @foreach ($projects as $project)
                    <div class="projectDiv bg-white shadow-sm rounded-2xl mt-20 relative">
                        <div
                            class="flex justify-between rounded-2xl bg-white border-b text-center border-gray-200 relative">
                            <div class="flex flex-col justify-center items-center basis-2/6">
                                <div class="absolute -top-14 border-8 border-white rounded-full">
                                    <img class="rounded-full w-24 h-24 object-cover"
                                        src="{{ asset('profile-images/' . $project->user->profile_image) }}"
                                        alt="">
                                </div>
                                <p class="text-md font-semibold mt-16">{{ $project->user->name }}
                                    {{ $project->user->surname }}</p>
                                <p class="text-sm custom-orange">I'm a {{ $project->user->academy->profession }}</p>
                                <p class="text-xs font-semibold mt-24">I'm looking for</p>
                                <div class="flex justify-center mt-4 overflow-hidden items-center">
                                    @foreach ($project->academies as $academy)
                                        <div class="rounded-t-full w-20 custom-bg-green p-2">
                                            <span
                                                class="text-[0.5rem] font-semibold text-white p-0 m-0">{{ $academy->profession }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="flex basis-4/6 flex-col px-6 py-4 justify-start items-start relative">
                                <p class="font-semibold mb-2">{{ $project->name }}</p>
                                <p class="show-read-more text-justify text-sm leading-5">{{ $project->description }}</p>
                                <div
                                    class="flex flex-col justify-center items-center custom-bg-green px-2 py-3 rounded-full absolute -top-8 right-8">
                                    <span
                                        class="text-white text-2xl font-semibold">{{ $project->applicants->count() }}</span>
                                    <span class="text-[0.60rem] text-white">Applicants</span>
                                </div>
                            </div>
                        </div>
                        <div class="buttonWrapper hidden pl-4 flex-col space-y-2 absolute -right-12 top-20">
                            <form action="{{ route('projects.edit', $project->id) }}"
                                method="GET">
                                @csrf
                                <button type="submit" class="w-10 h-10">
                                    <img src="{{ asset('ikons/8.png') }}" alt="">
                                </button>
                            </form>
                            <form action="{{ route('projects.destroy', $project->id) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-10 h-10">
                                    <img src="{{ asset('ikons/7.png') }}" alt="">
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

        @endif
    </div>
</x-app-layout>
