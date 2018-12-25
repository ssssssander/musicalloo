@extends('layouts.app')

@section('title', 'Home')

@section('main')
    <main>
        <div class="content">
            <h1>Talk to us</h1>

            <form>
            	<label>Name:</label>
            	<input type="text" name="name" required>

            	<label>E-mail:</label>
            	<input type="email" name="email" required>

            	<label>Message:</label>
            	<textarea name="message" required></textarea>

            	<button type="submit" class="btn">Send</button>
            </form>
        </div>

        @include('partials/toilet')

    </main>
@endsection
