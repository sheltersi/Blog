          
     <x-drop-down >

        <x-slot name="trigger">
            <button class="inline-flex text-leftb py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-40"> 
        
    
                {{-- Categories --}}
                {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'categories' }}
                
               <x-downarrow-icon name="down-arrow" class=" absolute pointer-events-none" style="right: 12px;" /> 
                </button>
        </x-slot>
        {{-- <a href="/"
        class="block text-left px-3 text-sm leading-6 bg-gray-100 hover:bg-blue-500 focus:bg-blue-500 hover:text-white">
        All
        </a> --}}

        {{-- The Code Above is now replaced by the code below --}}
        <x-dropdown-item 
        href="/?{{ http_build_query(request()->except('category','page')) }}" 
        
        :active="request()->routeIs('home')">All
    </x-dropdown-item>


@foreach ($categories as $category)

<x-dropdown-item
href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category','page')) }}"
:active="request()->is('categories/{$category->slug}')"   
>
    {{ ucwords($category->name) }}</x-dropdown-item>

@endforeach


     </x-drop-down>