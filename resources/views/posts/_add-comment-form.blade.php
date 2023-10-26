@auth
<form method="POST" action="/posts/{{ $post->slug }}/comments" class="border border-gray-200 p-6 rounded-xl">
    @csrf
    <header class="flex space-between">
        <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="40" height="40" class="rounded-full mr-3">
<h2>
    Want to Participate ?
</h2>
</header>

<div class="mt-6">
<textarea name="body" 
id="" class="border border-gray-600 w-full text-sm
 focus:outline-none focus:ring" cols="30" rows="10"
  placeholder="Comment anything" required>
</textarea>

@error('body')
<span class="text-xs text-red-500">{{ $message }}</span>
@enderror
</div>

<x-form.button>Post</x-form.button>
    
</form>
@else
<a href="/register" class="hover:underline text-blue-800">Register</a> or
<a href="/login" class="text-blue-800 hover:underline">Log in</a> to leave a comment.

@endauth


