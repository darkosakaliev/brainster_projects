<x-app-layout>
    <div class="overflow-auto py-12 bg-img homepage-bg">
        @if (auth()->user()->is_complete == 0)
            <x-incomplete />
        @endif
        <div class="flex flex-col px-6 xl:px-0 max-w-7xl mx-auto lg:flex-row">
            <div class="basis-full lg:basis-1/4">
                <p class="font-semibold">In what field can you be amazing?</p>
                <div id="academy-list" class="flex flex-wrap justify-center mt-20 mb-20 lg:mb-0"></div>
            </div>
            <div class="basis-full lg:basis-3/4">
                <div class="flex justify-end">
                    <img class="w-10 h-10 mr-2 mt-2" src="{{ asset('ikons/3.png') }}" alt="">
                    <p class="font-semibold">Checkout the latest projects</p>
                </div>
                <div id="project-list"></div>
                <!-- Overlay element -->
                <div id="overlay" class="fixed hidden z-40 w-screen h-screen inset-0 bg-gray-900 bg-opacity-60">
                </div>
                <!-- The dialog -->
                <div id="modal"
                    class="hidden fixed z-50 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 max-w-xs sm:max-w-sm md:max-w-md lg:max-w-7xl bg-white rounded-md px-8 py-6 space-y-5 drop-shadow-lg">
                    <h1 class="text-2xl font-semibold">Project Application</h1>
                    <div class="pb-4 flex flex-col">
                        <p class="font-semibold">Why should you apply for this project?</p>
                        <div id="errors"></div>
                        <textarea class="rounded-md" name="description" id="description" rows="10" cols="70"
                            placeholder="Write here.."></textarea>
                    </div>
                    <div class="flex justify-end space-x-4 mb-4">
                        <!-- This button is used to close the dialog -->
                        <button id="sendModal" class="px-5 py-2 custom-bg-orange text-white cursor-pointer rounded-md">
                            Apply</button>
                        <button id="closeModal"
                            class="px-5 py-2 bg-red-500 hover:bg-red-700 text-white cursor-pointer rounded-md">
                            Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
