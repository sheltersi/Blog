<x-layout>
    <x-slot name="content">

          <section class="px-6 py-8">
<h1 class="text-lg font-bold mb-8 pd-2 border-b">
Publish New Post
</h1>


<div class="flex">

<aside class="w-48">
  <h4 class="font-semiold mb-4">links</h4>

  <ul>
    <li>
<a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'text-blue-500' : '' }}">All Posts</a>
  </li>  
  <li>
    <a href="/admin/posts/create" class="{{ request()->is('admin/posts/create') ? 'text-blue-500' : '' }}">New Post</a>
      </li> 
</ul>

</aside>



<main class="flex-1">

<x-panel class="p-3 w-3/5">


    <table class="min-w-full border-collapse block md:table">
		
		<tbody class="block md:table-row-group">
		
            @foreach($posts as $post)
			<tr class="bg-white border border-grey-500 md:border-none block md:table-row">
				<td class="p-2 md:border md:border-grey-500 text-left text-blue-700 block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Name</span>
                    <a href="/posts/{{ $post->slug }}">
                    {{ $post -> title }}</a></td>
				<td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                    <button class="bg-green-500 hover:bg-red-700 text-green-900 font-bold py-1 px-2 border border-green-900 rounded-2xl">Published</button></td>
				<td class="p-2 md:border md:border-grey-500  block md:table-cell flex">
					<span class="inline-block w-1/3 md:hidden font-bold">Actions</span>
					<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">
                        <a href="/admin/posts/{{ $post->id }}/edit">
                        Edit</a></button>

                        <form method="POST" action="/admin/posts/{{ $post->id }}">
                        @csrf
                        @method('DELETE')

					<button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">Delete</button>
                        </form>
        </td>
			</tr>
			
            @endforeach
						
		</tbody>
	</table>
          </x-panel>
</main>

          </section>
        </x-slot>
    </x-layout>