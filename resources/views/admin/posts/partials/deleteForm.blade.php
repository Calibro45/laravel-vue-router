<form action="{{ route('admin.posts.destroy', $post) }}" method="POST" id="delete_post">
    @csrf
    @method('DELETE')
    <button type="submit" form="delete_post" class="btn btn-danger"
    onclick="return confirm('Vuoi eliminare il Post ?')">
        Elimina
    </button>
</form>