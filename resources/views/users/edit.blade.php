<x-app-layout>
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="p-12 custom-lightgray bg-img">
            @if (auth()->user()->is_complete == 0)
            <div class="mb-6">
                <x-incomplete />
            </div>
            @endif
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <div class="w-full lg:w-6\12">
                    <span class="text-2xl font-semibold">My Profile</span>
                    <div class="flex flex-wrap p-8">
                        <div class="w-6/12">
                            <div class="grid place-items-center">
                                <div class="grid place-items-center border-8 border-white rounded-full">
                                    <img class=" w-24 h-24 rounded-full object-cover"
                                        src="{{ asset('profile-images/') }}{{ auth()->user()->profile_image ? '/' . auth()->user()->profile_image : '/default.png' }}"
                                        alt="">
                                </div>
                            </div>
                            <label role="button" class="block mt-4 text-center" for="profile_image">Click here to
                                upload an
                                image</label>
                            <input type="file" class="hidden" id="profile_image" name="profile_image">
                            @error('profile_image')
                                <div class="text-red-600 text-xs mt-1 text-center">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="md:w-6/12">
                            <div>
                                <x-input id="name" class="block mt-4 w-full p-0 focus:outline-none" type="name"
                                    name="name" :value="auth()->user()->name" autofocus placeholder="Name" />
                                @error('name')
                                    <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <x-input id="surname" class="block mt-4 w-full p-0 focus:outline-none" type="surname"
                                    name="surname" :value="auth()->user()->surname" autofocus placeholder="Surname" />
                                @error('surname')
                                    <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <x-input id="email" class="block mt-4 w-full p-0 focus:outline-none" type="email"
                                    name="email" :value="auth()->user()->email" autofocus placeholder="Email" />
                                @error('email')
                                    <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="w-6/12">
                            <div class="flex flex-col mt-20">
                                <label for="bio" class="font-semibold custom-gray">Biography</label>
                                <textarea class="bg-transparent border-0 lg:resize-none focus:ring-0 p-0 mt-2 font-semibold custom-gray" name="bio"
                                    id="bio" cols="25" rows="7"
                                    placeholder="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.">{{ auth()->user()->bio }}</textarea>
                                @error('bio')
                                    <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-6\12">
                    <span class="text-2xl font-semibold mb-6">Skills</span>
                    <div class="w-full mt-4">
                        <div class="flex h-48 overflow-y-scroll flex-wrap mb-6">
                            @foreach ($skills as $skill)
                                <div>
                                    <input class="hidden" type="checkbox" name="skills[]"
                                        id="{{ str_replace(' ', '', $skill->name) }}" value="{{ $skill->id }}"
                                        {{ in_array($skill->id,auth()->user()->skills->pluck('id')->all())? 'checked': '' }}>
                                    <label role="button" for="{{ str_replace(' ', '', $skill->name) }}"
                                        class="w-24 h-24 mt-1 mr-1 text-center text-xs grid place-items-center font-semibold bg-white rounded-xl">
                                        {{ $skill->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        @error('skills')
                            <div class="text-red-600 text-xs mt-1">You must select maximum 10 or at least 5 skills.</div>
                        @enderror
                    </div>
                    <span class="text-2xl font-semibold mb-6">Academies</span>
                    <div class="w-full mt-4">
                        <div class="flex h-48 overflow-auto flex-wrap">
                            @foreach ($academies as $academy)
                                <input class="hidden" type="radio" name="academy_id"
                                    id="{{ str_replace([' ', '/'], '', $academy->name) }}" value="{{ $academy->id }}"
                                    {{ $academy->id == auth()->user()->academy_id ? 'checked' : '' }}>
                                <label role="button" for="{{ str_replace([' ', '/'], '', $academy->name) }}"
                                    class="w-24 h-24 mt-1 mr-1 text-center text-xs grid place-items-center font-semibold bg-white rounded-xl">
                                    {{ $academy->name }}
                                </label>
                            @endforeach
                        </div>
                        @error('academy_id')
                            <div class="text-red-600 text-xs mt-1">You must choose an academy.</div>
                        @enderror
                    </div>
                    <div class="flex justify-end">
                        <button class="custom-bg-green py-3 px-24 rounded-lg text-white" type="submit">EDIT</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
