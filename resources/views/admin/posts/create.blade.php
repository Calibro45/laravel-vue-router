@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 class="text-center text-uppercase">Crea un nuovo post</h1>
    </div>

    <div class="container">
        
        <form action="{{ route('admin.posts.store') }}" method="POST">
            @csrf

            {{-- post title --}}

            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" name="title"  id="title" placeholder="Titolo" value="{{ old('title') }}"
                class="form-control @error('title') is-invalid @enderror">

                {{-- errors --}}

                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- post category --}}

            <div class="form-group">
                <label for="categories">Categoria</label>
                <select id="categories" name="category_id" 
                class="form-control @error('category_id') is-invalid @enderror">
                  <option value="">-- seleziona categoria --</option>
                  @foreach ($categories as $category)
                    <option {{ old('category_id') == $category->id ? 'selected' : '' }} 
                    value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                  @endforeach
                </select>

                {{-- errors --}}

                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- post tags --}}

            <div>
                <label for="chekbox-tag">Tags</label>
            </div>
            <div class="d-flex mb-3">
                @foreach ($tags as $index => $tag)
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="tags[{{$index}}]" value="{{ $tag->id }}"
                        class="custom-control-input" id="tags-{{ $tag->id }}"
                        {{(is_array(old('tags')) && in_array($tag->id, old('tags'))) ? 'checked' : ''}}>
                        <label class="custom-control-label pr-3" for="tags-{{ $tag->id }}">
                            {{ $tag->name }}
                        </label>
                    </div>

                    {{-- errors --}}
        
                    @error('tags.{{$index}}')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                @endforeach
            </div>
            

            {{-- post content --}}

            <div class="form-group">
                <label for="content">Articolo</label>
                <textarea class="form-control @error('content') is-invalid @enderror" 
                id="content" rows="5" name="content">{{ old('content') }}</textarea>

                {{-- errors --}}

                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- post published date --}}

            <div class="form-group">
                <label for="published_at">Data Pubblicazione</label>
                <input type="date" name="published_at"  id="published_at" value="{{ old('published_at') }}"
                class="form-control @error('published_at') is-invalid @enderror">

                {{-- errors --}}

                @error('published_at')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- post button --}}

            <button type="submit" class="btn btn-primary">Crea</button>

        </form>

    </div>
    
@endsection