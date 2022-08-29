<x-app-layout>
    <form action="{{ route('projects.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="flex flex-col md:flex-row p-12 overflow-auto bg-img custom-lightgray">
            <div class="basis-2/4">
                <p class="font-semibold text-2xl">Edit Project</p>
                <div class="flex flex-col mt-12">
                    <div class="md:w-6/12">
                        <x-input id="name" class="block w-full p-0 focus:outline-none" type="name" name="name"
                            autofocus placeholder="Name of Project" value="{{ $project->name }}" />
                        @error('name')
                            <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="grow">
                        <div class="flex flex-col mt-12">
                            <label for="description" class="font-semibold custom-gray">Description of Project</label>
                            <textarea class="bg-transparent resize-none border-0 focus:ring-0 p-0 mt-2 font-semibold custom-gray" name="description"
                                id="description" rows="7"
                                placeholder="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.">{{ $project->description }}</textarea>
                            @error('description')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="basis-2/4 mt-12 md:mt-0">
                <p class="font-semibold text-2xl">What I need</p>
                <div class="flex mt-12 flex-wrap justify-center items-center">
                    @foreach ($academies as $academy)
                        <input class="hidden" type="checkbox" name="academies[]"
                            id="{{ str_replace([' ', '/'], '', $academy->name) }}" value="{{ $academy->id }}"
                            {{ in_array($academy->id, $project->academies->pluck('id')->all()) ? 'checked' : '' }}>
                        <label role="button" for="{{ str_replace([' ', '/'], '', $academy->name) }}"
                            class="w-28 h-28 mt-2 mr-3 text-center text-sm grid place-items-center font-semibold bg-white rounded-xl">
                            {{ $academy->name }}
                        </label>
                    @endforeach
                </div>
                <div class="custom-orange text-xs mt-6 text-right font-semibold">Please select no more than 4 options
                </div>
                <div class="flex justify-end mt-20">
                    <button class="custom-bg-green py-3 px-24 rounded-lg text-white" type="submit">EDIT</button>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
