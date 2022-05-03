@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 class="text-center text-uppercase">Crea un nuovo post</h1>
    </div>

    <div class="container">
        
        <form action="{{ route('admin.posts.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" name="title"  id="title" placeholder="Titolo" value="{{ old('title') }}"
                class="form-control @error('title') is-invalid @enderror">

                {{-- errors --}}

                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="content">Articolo</label>
                <textarea class="form-control @error('content') is-invalid @enderror" 
                id="content" rows="5" name="content">{{ old('content') }}</textarea>

                {{-- errors --}}

                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="published_at">Data Pubblicazione</label>
                <input type="date" name="published_at"  id="published_at" value="{{ old('published_at') }}"
                class="form-control @error('published_at') is-invalid @enderror">

                {{-- errors --}}

                @error('published_at')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Crea</button>

        </form>

    </div>
    
@endsection