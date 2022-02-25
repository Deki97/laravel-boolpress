@extends('layouts.dashboard')

@section('content')
    <section>
        <h1>{{ $post->title }}</h1>

        <div class="mb-3">Slug: {{ $post->slug }}</div>

        @if($post->category)
            <div class="mb-3">Categoria: {{ $post->category ? $post->category->name : 'Nessuna categoria' }}</div>
        @endif

        <div class="mb-3">
            Tags:
            @forelse ($post->tags as $tag)
                {{ $tag->name }}{{ !$loop->last ? ', ' : '' }}
            @empty
                nessun tag
            @endforelse
        </div>

        
        <p>{{ $post->content }}</p>

        <div>
            <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}">Modifica</a>
        </div>

        <div>
            <form action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="post">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger">Rimuovi</button>
            </form>
        </div>
    </section>
@endsection