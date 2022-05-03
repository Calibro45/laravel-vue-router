<form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger"
    onclick="return confirm('Vuoi eliminare il Post ?')">
        Elimina
    </button>
</form>