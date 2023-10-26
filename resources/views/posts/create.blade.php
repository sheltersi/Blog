{{-- @props['$categories'] --}}
<x-layout>
    <x-slot name="content">

          <section class="px-6 py-8">
<h1 class="text-lg font-bold mb-8 pd-2 border-b">
Publish New Post yal
</h1>


<div class="flex">

<aside class="w-48">
  <h4 class="font-semiold mb-4">links</h4>

  <ul>
    <li>
<a href="/admin/posts" class="{{ request()->is('admin/dashboard') ? 'text-blue-500' : '' }}">All Posts</a>
  </li>  
  <li>
    <a href="/admin/posts/create" class="{{ request()->is('admin/posts/create') ? 'text-blue-500' : '' }}">New Post</a>
      </li> 
</ul>

</aside>



<main class="flex-1">

<x-panel class="p-3 w-3/5">
            <form action="/admin/posts" enctype="multipart/form-data" method="POST" class="w-3/5 mx-auto">
@csrf

<x-form.input name="title"/>
<x-form.input name="slug"/>
<x-form.txtarea name="excerpt" />
<x-form.txtarea name="body" />

<div class="mb-6">
  <label class="block mb-2 uppercase font-bold r=text-xs text-gray-700"
  for="thumbnail">
  Thumbnail
  </label>
  <input class="border border-gray-400 p-2 w-full"
  type="file"
  name="thumbnail"
  id="thumbnail"
  value{{old('thumbnail')}} required />
  @error('thumbnail')
  <p class="text-red-500 text-xs mt-2">{{$message}}</p>
  @enderror
  </div>

    <div class="mb-6">
      <label class="block mb-2 uppercase font-bold r=text-xs text-gray-700"
      for="category_id">
     Category
      </label>
      <select class="p-2 w-full" name="category_id" id="category_id" >
{{-- @php
$categories=\App\Models\Category::all();
@endphp --}}

@foreach(\App\Models\Category::all() as $category)
<option value={{$category->id}}
  {{old('category_id') === $category->id ? 'selected' : ''}}
  >{{ucwords($category->name)}}</option>
@endforeach
      </select>
      @error('category')
      <p class="text-red-500 text-xs mt-2">{{$message}}</p>
      @enderror
      </div>

    <x-form.button>Publish</x-form.button>

            </form>

          </x-panel>
</main>

          </section>
        </x-slot>
    </x-layout>