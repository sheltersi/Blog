@props(['trigger'])

<div x-data="{ show : false }" @click.away="show =false" class="relative">

    {{-- this is the trigger button to show all the categories --}}

<div @click="show = ! show">
{{ $trigger }}
</div>

    {{-- these are drop down links --}}
    
    <div x-show="show" class="py-1 md:absolute w-full lg:w-40 text-center z-50" style="display:none">
   {{ $slot }}
    </div>
    </div>