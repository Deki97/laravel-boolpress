@extends('layouts.dashboard')

@section('content')
    <section>
        <h2>Crea nuovo post</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="mb-4">
              <label for="title" class="form-label">Titolo</label>
              <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
            </div>

            <div class="mb-4">
                <label for="category_id" class="form-label">Categoria</label>
                <select class="form-select" id="category_id" name="category_id">
                    <option value="">Nessuna categoria</option>
                        
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                @foreach ($tags as $tag)
                    <div class="form-check">
                        <input {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }} class="form-check-input" name="tags[]" type="checkbox" value="{{ $tag->id }}" id="tag-{{ $tag->id }}">
                        <label class="form-check-label" for="tag-{{ $tag->id }}">
                            {{ $tag->name }}
                        </label>
                    </div>
                @endforeach
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Contenuto</label>
                <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{ old('content') }}</textarea>
            </div>

            {{-- Validazione dell'immagine da caricare --}}
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            {{-- Input tramite la quale posso fare upload di file, in questo caso dell'immagine del post --}}
            <div class="mb-4">
                <label for="image" class="form-label">Image</label>
                <input type="file" id="image" name="image">
            </div>

            <button type="submit" class="btn btn-primary">Crea post</button>
          </form>
    </section>
@endsection