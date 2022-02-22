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

        <form action="{{ route('admin.posts.store') }}" method="post">
            @csrf
            @method('POST')

            <div class="mb-4">
              <label for="title" class="form-label">Titolo</label>
              <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Contenuto</label>
                <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{ old('content') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Crea post</button>
          </form>
    </section>
@endsection