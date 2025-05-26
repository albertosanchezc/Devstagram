<div>
    {{-- @forelse ($posts as $post)
        <h1>{{ $post->titulo }}</h1>
    @empty
        <p>No Hay Posts</p>
    @endforelse --}}


    @if ($posts->count())
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 m-10">
            @foreach ($posts as $post)
                <div>
                    {{-- iteramos sobre los posts para redirigir a su respectiva ruta --}}
                    <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user]) }}">
                        <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del Post {{ $post->titulo }}">
                    </a>


                </div>
            @endforeach
        </div>

        <div class="my-10">
            {{-- Lo de abajo es el paginador --}}
            {{ $posts->links() }}
        </div>
    @else
        <p>No Hay Posts</p>
    @endif

</div>
