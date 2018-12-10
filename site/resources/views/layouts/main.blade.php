@extends('layouts.app')

@section('main')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                @include('partials.messages')
                @yield('content')
            </div>
        </div>
    </main>
@endsection
