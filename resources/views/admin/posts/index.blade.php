@extends('layouts.app')

@section('content')

    <div class="container">
        <form action="{{ route('admin.posts.index') }}" method="POST" class="mb-3">
            @csrf
            @method('GET')
            <label for="filter">Ordina Crescente</label>
            <select name="filter" class="custom-select w-auto">
                <option value="">Ripristina</option>
                @foreach ($columnNames as $name)
                    <option value="{{$name}}">{{$name}}</option>
                @endforeach
            </select>

            <button type="submit" class="btn btn-primary">
                Filtra
            </button>
        </form>

        <table class="table table-hover">
            <thead class="thead-dark text-center">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Titolo</th>
                <th scope="col">Slug</th>
                <th scope="col">Categoria</th>
                <th scope="col">Tag</th>
                <th scope="col">Data Pubblicazione</th>
                <th scope="col">Data creazione</th>
                <th scope="col">Data Modifica</th>
                <th scope="col">Modifica</th>
                <th scope="col">Elimina</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)                        
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->slug }}</td>
                        <td>{{ $post->category ? $post->category->name : '--' }}</td>
                        <td>
                            @foreach ($post->tags as $tag)
                                <span class="badge badge-pill badge-info text-light">
                                    {{ $tag->name }}
                                </span> 
                            @endforeach
                        </td>
                        <td>{{ $post->published_at }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>{{ $post->updated_at }}</td>
                        <td>
                            <button class="btn btn-secondary">
                                <a href="{{ route('admin.posts.edit', $post) }}" class="text-light">Modifica</a>
                            </button>
                        </td>
                        <td>
                            @include('admin.posts.partials.deleteForm')
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>

    </div>
    
@endsection