<x-guest-layout>
    <div class="bg-img-guest register-bg p-6">


        <span class="text-5xl font-semibold">Register</span>
        <div class="w-3/6 mt-10">
            <form class="flex flex-col flex-wrap  space-y-2 md:space-y-0" method="POST" action="{{ route('register') }}">
                @csrf

                <div class="flex flex-col md:flex-row md:space-x-12 space-y-2 md:space-y-0">
                    <!-- Name -->
                    <div class="">
                        <x-input id="name" class="block mt-1 w-full p-0 font-semibold" type="text" name="name"
                            :value="old('name')" autofocus placeholder="Name" />
                        @error('name')
                            <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Surname -->
                    <div class="">
                        <x-input id="surname" class="block mt-1 w-full p-0 font-semibold" type="text"
                            name="surname" :value="old('surname')" autofocus placeholder="Surname" />
                        @error('surname')
                            <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-12">
                    <!-- Email Address -->
                    <div class="">
                        <x-input id="email" class="block mt-1 w-full p-0 font-semibold" type="email"
                            name="email" :value="old('email')" placeholder="Email" />
                        @error('email')
                            <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="">
                        <x-input id="password" class="block mt-1 w-full p-0 font-semibold" type="password"
                            name="password" autocomplete="new-password" placeholder="Password" />
                        @error('password')
                            <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="flex flex-col">
                    <!-- Biography -->
                    <div class="mt-10 flex-col flex">
                        <label for="bio" class="font-semibold custom-gray">Biography</label>
                        <textarea
                            class="bg-transparent max-w-xs sm:max-w-sm md:max-w-md lg:max-w-full border-0 focus:ring-0 p-0 mt-2 font-semibold custom-gray"
                            name="bio" id="bio" cols="45" rows="7"
                            placeholder="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.">{{ old('bio') }}</textarea>
                        @error('bio')
                            <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="">
                    <x-button class="text-2xl rounded-xl text-white px-20 py-4 mt-12 custom-bg-green">
                        {{ __('Register') }}
                    </x-button>
                    <span class="mt-2 block mb-6">Already have an account? Login <a class="underline" href="{{ route('login') }}">here!</a></span>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
