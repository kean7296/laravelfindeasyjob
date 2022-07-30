@if (session()->has('success'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed top-0 left-1/2 transform -translate-x-1/2 text-center bg-green-400 text-white w-full md:w-1/2 py-3 z-50">
       <p class="text-xl font-bold">{{session('success')}}</p>
    </div>
@endif