<div class="bg-white shadow-sm rounded-2xl mt-20">
    <div class="flex justify-between rounded-2xl bg-white border-b text-center border-gray-200 relative">
        <div class="flex flex-col justify-center items-center basis-2/6">
            <div class="absolute -top-14 border-8 border-white rounded-full">
                <img class="rounded-full w-24 h-24 object-cover"
                    src="{{ asset('profile-images/' . $project->user->profile_image) }}" alt="">
            </div>
            <p class="text-md font-semibold mt-16">{{ $project->user->name }}
                {{ $project->user->surname }}</p>
            <p class="text-sm custom-orange">I'm a {{ $project->user->academy->profession }}</p>
            <p class="text-xs font-semibold mt-24">I'm looking for</p>
            <div class="flex justify-center mt-4 overflow-hidden items-center">
                @foreach ($project->academies as $academy)
                    <div class="rounded-t-full w-20 custom-bg-green p-2">
                        <span class="text-[0.5rem] font-semibold text-white p-0 m-0">{{ $academy->profession }}</span>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="flex basis-4/6 flex-col px-6 py-4 justify-start items-start relative">
            <p class="font-semibold mb-2">{{ $project->name }}</p>
            <p class="text-justify text-sm leading-5 show-read-more">{{ $project->description }}</p>
            <button data-id="{{ $project->id }}"
                class="openModal rounded-lg py-2 self-end mt-auto custom-bg-green text-white px-20 disabled:opacity-50"
                {{ $project->created_by == auth()->user()->id || auth()->user()->is_complete == 0 ? 'disabled' : '' }}>I'M
                IN</button>
            <div
                class="flex flex-col justify-center items-center custom-bg-green px-2 py-3 rounded-full absolute -top-8 right-8">
                <span class="text-white text-2xl font-semibold">{{ $project->applicants->count() }}</span>
                <span class="text-[0.60rem] text-white">Applicants</span>
            </div>
        </div>
    </div>
</div>
