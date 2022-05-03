@extends('layouts.app')

@section('content')

    <div class="container">
        
        <form action="{{ route('admin.posts.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" name="title"  id="title" placeholder="Titolo" 
                class="form-control @error('title') is-invalid @enderror">

                {{-- errors --}}

                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Crea</button>

        </form>

    </div>
    
@endsection