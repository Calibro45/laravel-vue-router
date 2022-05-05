<form action="{{ route('admin.posts.destroy', $post) }}" method="POST" id="delete_post-{{$post->id}}">
    @csrf
    @method('DELETE')
    <button type="submit" form="delete_post-{{$post->id}}" class="btn btn-danger"
    onclick="return confirm('Vuoi eliminare il Post ?')">
        Elimina
    </button>
</form>