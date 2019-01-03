<!-- @extends('layouts.app')

@section('main')
    <main class="{{ (Request::is('admin/*')) ? "admin-main py-4" : "py-4" }}">
        <div class="container">
            <div class="row justify-content-center">
                @include('partials.messages')
                @yield('content')
            </div>
        </div>
    </main>
@endsection -->
