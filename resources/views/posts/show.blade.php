<x-layout>

<x-slot name="content">

      <section class="px-6 py-8">
        
          <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
              <article
                  class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
                  <div class="py-6 px-5 lg:flex">
                      <div class="flex-1 lg:mr-8">
                        {{-- <img src="{{}}"    > --}}
                          <img src="/storage/{{ $post->thumbnail }}" alt="Blog Post illustration" class="rounded-xl">
                      </div>
  
                      <div class="flex-1 flex flex-col justify-between">
                          <header class="mt-8 lg:mt-0">
                              <div class="space-x-2">
                                  <a href="/"
                                     class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                                     style="font-size: 10px"> << Back to posts</a>
  
                                  <x-category-button :category="$post->category" />
                              </div>
  
                              <div class="mt-4">
                                  <h1 class="text-3xl">
                                    <a href="/posts/{{ $post->slug }}">
                                      {{ $post->title }}
                                  </a>
             
                                  </h1>
  
                                  <span class="mt-2 block text-gray-400 text-xs">
                                          Published <time>{{ $post->created_at->format('F j, Y, g:i a') }}</time>
                                      </span>
                              </div>
                          </header>
  
                          <div class="text-sm mt-2">
                              <p>
                                  {!! $post->body !!}
                              </p>
  
                              <p class="mt-4">
{!! $post->excerpt !!}
                              </p>
                          </div>
  
                          <footer class="flex justify-between items-center mt-8">
                              <div class="flex items-center text-sm">
                                  <img src="/images/lary-avatar.svg" alt="{{ $post->author->name }}">
                                  <div class="ml-3">
                                    <h5 class="font-bold">
                                        <a href="/?author={{ $post->author->username }}">{{ $post->author->name }}</a></h5>
                
                                  </div>
                              </div>
  
                              <div class="hidden lg:block">
                                  <a href="#"
                                     class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                                  >Read More</a>
                              </div>
                          </footer>
                      </div>
                  </div>


<section class="col-span-8 col-start-5 mt-10 space-y-6">

    @include ('posts._add-comment-form');

 @foreach ($post->comments as $comment)
    <x-post-comment :comment="$comment" />
 @endforeach
</section>


              </article>

          </main>
      </section>
  </body>
  

</x-slot>

</x-layout>


