@props(['active' => false])

{{-- <a href="/"
class="block text-left px-3 text-sm leading-6 bg-gray-100 hover:bg-blue-500 focus:bg-blue-500 hover:text-white">
All
</a> --}}

{{-- the above code was changed to below code --}}



@php
    $classes = 'block text-left px-3 text-sm leading-6 bg-gray-100 hover:bg-blue-500 focus:bg-blue-500 hover:text-white';

if($active) $classes .= ' bg-blue-500 text-white';
@endphp

<a {{ $attributes(['class' => $classes]) }}
    >{{ $slot }}</a>
