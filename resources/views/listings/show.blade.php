<x-layout>
@include('sections.search')
<div class="mx-auto max-w-4xl">
    <x-card class="">
        <div class="w-full flex justify-between mb-3">
            <a href="/" class="form-link flex items-center">
                <img src="{{asset('images/back.svg')}}" alt="back" class="mr-1 w-5"> Back 
            </a>

            @auth
                @if ($user_id == auth()->user()->id)
                    <div class="flex gap-3">
                        <a href="/posts/{{encrypt($id)}}/edit" class="form-link flex items-center">
                            <img src="{{asset('images/edit.svg')}}" class="mr-1 w-5" alt="edit"> Edit    
                        </a>
                        <form method="POST" action="/posts/{{encrypt($id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="form-link flex items-center text-red-500 hover:text-red-600">
                                <img src="{{asset('images/delete.svg')}}" class="mr-1 w-5" alt="delete"> Delete
                            </button>
                        </form>
                    </div>
                @endif
            @endauth
        </div>
        <div class="flex flex-col items-center justify-center text-center">
            <img class="w-48 mr-6 mb-6" src="{{$logo ? asset("storage/$logo") : asset('images/post-default.png')}}" alt="{{$logo ? $company : 'company'}}" />

            <h3 class="text-2xl mb-2">{{$title}}</h3>
            <div class="text-xl font-bold mb-4">{{$company}}</div>

            <x-listing-tags :tagsCsv="$tags" />
            
            <div class="text-lg my-4">{{$location}}</div>
            <div class="mb-6"></div>
            <div>
                <h3 class="text-3xl font-bold">Job Description</h3>
                <div class="text-lg mb-5">
                    {{$description}}
                </div>
                <div class="flex flex-col gap-2 items-center">
                    <a href="mailto:{{$email}}" class="form-btn flex">
                        <img src="{{asset('images/email.svg')}}" class="mr-1 w-5" alt="delete">Contact Employer
                    </a>
                    <a href="{{$website}}" target="_blank" class="form-link underline">{{$website}}</a>
                </div>
            </div>
        </div>
    </x-card>
</div>
</x-layout>