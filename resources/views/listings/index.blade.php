<x-layout>
    {{-- @include('sections.hero') --}}
    @include('sections.search')
    <div class="flex flex-col lg:grid lg:grid-cols-2 gap-4 md:space-y-0 ">
        @unless (count($listing) == 0)
            @foreach ($listing as $list)
                <x-listing-card :listing="$list"/>
            @endforeach
        @else
            <h2>No listing</h2>
        @endunless
    </div>

    <div class="mt-6 py-4">
        {{$listing->links()}}
    </div>
    @auth <x-add-post /> @endauth
</x-layout>