<form method="POST" action="{{ route('music.destroy', ['id' => $musicSet->id]) }}">
    @csrf
    @method('DELETE')
    <input type="submit" value="Delete music set">
</form>
