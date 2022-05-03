@extends('layouts.app')

@section('content')

    <ol>
        @foreach ($posts as $post)
            
            <li>
                {{ $post->title }}
            </li>

        @endforeach
    </ol>
    
@endsection