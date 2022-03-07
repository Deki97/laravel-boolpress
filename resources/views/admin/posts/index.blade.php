@extends('layouts.dashboard')

@section('content')
    <div class="container">
       <h1>Tutti i post</h1> 

       <div class="row row-cols-3">
        @foreach ($posts as $post)
            <div class="col">
                <div class="card mt-3">

                    {{-- Visualizzo l'immagine solo se c'è, per evitare che il layout si 'rompa' --}}
                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}">
                    @endif
                    
                    <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ Str::substr($post->content, 0, 50) }}...</p>
                    <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}" class="btn btn-primary">Vai al post</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </div>
@endsection