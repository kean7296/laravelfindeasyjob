<x-layout>
    <div class="absolute -z-50 top-0 bottom-0 right-0 left-0 flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-2 items-center text-center">
            <div>
                <h1 class="text-4xl font-bold">@yield('code')</h1>
                <h2 class="text-3xl">@yield('message')</h2>
            </div>
            <img class='w-full md:w-3/4' src="{{asset('images/error-page.png')}}" alt="error">
            <p class="text-xl">@yield('description')</p>
        </div>
    </div>
</x-layout>

