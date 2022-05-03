@extends('layouts.app')

@section('content')

    <ol>
        @foreach ($posts as $post)
            
            <li>
                {{ $post->title }}
                {{ $post->slug }}
            </li>

        @endforeach
    </ol>
    
@endsection