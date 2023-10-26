@props(['post'])

<div>
             
    <a href="/">
        <img src="{{ asset('/storage' . $post->thumbnail) }}" alt="Laracasts Logo" width="165" height="16">
    </a>
</div>