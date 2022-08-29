<x-guest-layout>
    <div class="login-bg bg-img-guest flex-wrap md:flex justify-center items-center px-20">
        <div class="w-full md:w-8/12 self-start">
            <div class="w-full h-80">
                <x-big-logo />
            </div>
            <span class="ml-8 text-3xl font-semibold">Propel your ideas to life!</span>
        </div>
        <div class="w-full md:w-3/12 mt-20">
            <form class="w-50" method="POST" action="{{ route('login') }}">
                @csrf
                <span class="text-3xl font-extrabold">Login</span>
                <!-- Email Address -->
                <div>
                    <x-input id="email" class="block mt-4 w-full p-0" type="email" name="email"
                        :value="old('email')" autofocus placeholder="Email" />
                    @error('email')
                        <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input id="password" class="block mt-1 w-full p-0" type="password" name="password"
                        autocomplete="current-password" placeholder="Password" />
                    @error('password')
                        <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex flex-col items-end justify-end mt-4">
                    <x-button class="ml-3 px-10 py-1 custom-bg-orange text-white">
                        {{ __('Login') }}
                    </x-button>
                    <span class="text-sm text-gray-600 mt-4">Don't have an account? Register
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                            {{ __('here!') }}
                        </a>
                    </span>
                </div>
            </form>
        </div>



    </div>
</x-guest-layout>
