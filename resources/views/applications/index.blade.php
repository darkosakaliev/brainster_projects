<x-app-layout>
    <div class="overflow-auto py-12 bg-img applications-bg">
        @if (auth()->user()->is_complete == 0)
        <x-incomplete />
        @else
        <div class="max-w-7xl px-6 xl:px-0 mx-auto">
            <p class="text-2xl font-semibold mb-4">My Applications</p>
        </div>
        @if(Session::get('message'))
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-4 custom-bg-green text-center text-white rounded-md">
            <p>{{ Session::get('message') }}</p>
        </div>
        @endif
        <div class="max-w-xl md:max-w-2xl lg:max-w-4xl xl:max-w-5xl mx-auto px-6 xl:px-0">
            @foreach ($applications as $application)
                <div class="projectDiv bg-white shadow-sm rounded-2xl mt-20 relative">
                    <div
                        class="flex flex-col md:flex-row rounded-2xl bg-white border-b text-center border-gray-200 relative">
                        <div class="flex flex-col justify-center items-center basis-2/6">
                            <div class="absolute -top-14 border-8 border-white rounded-full">
                                <img class="rounded-full w-24 h-24 object-cover"
                                    src="{{ asset('profile-images/' . $application->project->user->profile_image) }}"
                                    alt="">
                            </div>
                            <p class="text-md font-semibold mt-16">{{ $application->project->user->name }}
                                {{ $application->project->user->surname }}</p>
                            <p class="text-sm custom-orange">I'm a {{ $application->project->user->academy->profession }}</p>
                            <p class="text-xs font-semibold mt-6 md:mt-20 lg:mt-24">I'm looking for</p>
                            <div class="flex justify-center mt-4 overflow-hidden items-center">
                                @foreach ($application->project->academies as $academy)
                                    <div class="rounded-t-full w-20 custom-bg-green p-2">
                                        <span
                                            class="text-[0.5rem] font-semibold text-white p-0 m-0">{{ $academy->profession }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="flex basis-4/6 flex-col px-6 py-4 justify-start items-start relative mt-12 md:mt-0">
                            <p class="font-semibold mb-2">{{ $application->project->name }}</p>
                            <p class="show-read-more text-justify text-sm leading-5">{{ $application->project->description }}</p>
                            @if($application->is_accepted === 0)
                            <div class="mt-auto flex">
                                <p class="mr-4 text-xl custom-red">Application Denied</p>
                                <img class="w-5 h-5" src="{{ asset('ikons/6.png') }}" alt="">
                            </div>
                            @elseif ($application->is_accepted === 1)
                            <div class="mt-auto flex">
                                <p class="mr-4 text-xl custom-green">Application Accepted</p>
                                <img class="w-5 h-5" src="{{ asset('ikons/5.png') }}" alt="">
                            </div>
                            @endif
                            <div
                                class="flex flex-col justify-center items-center custom-bg-green px-2 py-3 rounded-full absolute -top-8 right-8">
                                <span
                                    class="text-white text-2xl font-semibold">{{ $application->project->applicants->count() }}</span>
                                <span class="text-[0.60rem] text-white">Applicants</span>
                            </div>
                        </div>
                    </div>
                    @if($application->is_accepted == null || $application->is_accepted == 0)
                    <div class="buttonWrapper hidden pl-10 pt-5 pb-5 flex-col space-y-2 absolute right-10 md:-right-12 top-5 md:top-24">
                        <form action="{{ route('applications.cancel', $application->id) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="cancelButton w-5 h-5 flex flex-col justify-center items-center">
                                <img src="{{ asset('ikons/2.png') }}" alt="">
                                <span>Cancel</span>
                            </button>
                        </form>
                    </div>
                    @endif
                </div>
            @endforeach
        </div>
        @endif
    </div>
</x-app-layout>
