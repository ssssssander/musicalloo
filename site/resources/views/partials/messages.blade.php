@if (Session::has('success'))
    <p>{{ Session::get('success') }}</p>
@endif

@if ($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
