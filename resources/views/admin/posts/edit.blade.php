{{-- @props['$categories'] --}}
<x-layout>
    <x-slot name="content">

          <section class="px-6 py-8">
<h1 class="text-lg font-bold mb-8 pd-2 border-b">
Edit The Post! {{ $post->title }}
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
            <form method="POST"  action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data" class="w-3/5 mx-auto">
@csrf
@method('PATCH')

<x-form.input name="title" value="{{ $post->title }}"/>
<x-form.input name="slug" value="{{ $post->slug }}"/>
<x-form.txtarea name="excerpt">{{ old('excerpt', $post->excerpt) }}</x-form.textarea>
<x-form.txtarea name="body">{{ old('body', $post->body) }}</x-form.textarea>


<div class="mb-6">
  <label class="block mb-2 uppercase font-bold r=text-xs text-gray-700"
  for="thumbnail">
  Thumbnail
  </label>
  <input class="border border-gray-400 p-2 w-full"
  type="file"
  name="thumbnail"
  id="thumbnail"
  value{{old($post->thumbnail)}}
  />

  @error('thumbnail')
  <p class="text-red-500 text-xs mt-2">{{$message}}</p>
  @enderror

  <img src="{{ asset('storage/' . $post->thumbnail) }}"class="border border-gray-400 p-2 w-full" class="rounded-xl ml-6" width="100"/>

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
  {{old('category_id', $post->category_id )=== $category->id ? 'selected' : ''}}
  >{{ucwords($category->name)}}</option>
@endforeach
      </select>
      @error('category')
      <p class="text-red-500 text-xs mt-2">{{$message}}</p>
      @enderror
      </div>

    <x-form.button>Update</x-form.button>

            </form>

          </x-panel>
</main>

          </section>
        </x-slot>
    </x-layout>