@props(['name'])

<div class="mb-6">
    <label class="block mb-2 uppercase font-bold r=text-xs text-gray-700"
    for="{{ $name }}">
{{ ucwords($name) }}
    </label>
    <textarea class="border border-gray-400 p-2 w-full"
    name="{{ $name }}"
    id="{{ $name }}"
    required
    {{ $attributes }}
    >{{$slot ?? old($name)}}</textarea>
    
    <x-form.error name= "{{ $name }}" />
    </div>