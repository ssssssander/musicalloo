<form method="POST" action="{{ route('marker.destroy', ['id' => $marker->id]) }}">
    @csrf
    @method('DELETE')
    <input type="submit" value="Delete marker">
</form>
