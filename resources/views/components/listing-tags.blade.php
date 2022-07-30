@props(['tagsCsv'])

@php
    $tags = explode(',', $tagsCsv);
@endphp

<ul class="flex flex-wrap w-full">
    @foreach ($tags as $tag)
    <li {{$attributes->merge(['class' => 'flex items-center justify-center mr-2 text-sm'])}} >
        <a href="/?tag={{$tag}}" class="font-bold hover:bg-primary-darker bg-primary text-text-light rounded-md py-1 px-3 hover:text-white transition-all">{{$tag}}</a>
    </li>
    @endforeach
</ul>