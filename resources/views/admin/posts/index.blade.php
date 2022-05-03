@extends('layouts.app')

@section('content')

    <div class="container">

        <table class="table table-hover">
            <thead class="thead-dark text-center">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Titolo</th>
                <th scope="col">Slug</th>
                <th scope="col">Data Pubblicazione</th>
                <th scope="col">Data creazione</th>
                <th scope="col">Data Modifica</th>
                <th scope="col">Modifica</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)                        
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->slug }}</td>
                        <td>{{ $post->published_at }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>{{ $post->updated_at }}</td>
                        <td>
                            <button class="btn btn-secondary">
                                <a href="">Modifica</a>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>

    </div>
    
@endsection