@props(['listing'])

<x-card>
    <div class="flex gap-1 h-full">
        <div class="hidden md:flex content-center w-1/4 items-center">
            <img class="hidden max-w-full md:block "
                src="{{ $listing->logo ? asset("storage/$listing->logo") : asset('images/post-default.png') }}"
                alt="comapny profile"/>
        </div>
        <div class="w-3/4 flex flex-col">
            <h3 class="text-xl font-bold">{{$listing->title}}</h3>
            <div class="text-lg">{{$listing->company}}</div>
            <div class="text-base">{{$listing->location}}</div>
            <x-listing-tags :tagsCsv="$listing->tags" class="my-1" />
            <p class="text-md truncate">{{$listing->description}}</p>
            <div class="flex-1 flex items-end">
                @if (request()->routeIs('manage.post'))
                    @auth
                        <div class="flex gap-3 py-2">
                            <a href="/posts/{{encrypt($listing->id)}}/edit" class="form-link flex items-center">
                                <img src="{{asset('images/edit.svg')}}" class="mr-1 w-5" alt="edit"> Edit    
                            </a>
                            <form method="POST" action="/posts/{{encrypt($listing->id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="form-link flex items-center text-red-500 hover:text-red-600">
                                    <img src="{{asset('images/delete.svg')}}" class="mr-1 w-5" alt="delete"> Delete
                                </button>
                            </form>
                        </div>
                    @endauth
                @else
                    <a href="/posts/{{encrypt($listing->id)}}" class="form-link font-bold flex gap-2">view more <img src="{{asset('images/right-icon.svg')}}" alt="right"></a>
                @endif
            </div>
        </div>
    </div>
</x-card>