@extends('layouts.app')

@section('title', 'Home')

@include('partials.nav')
@section('main')
    <main>
        <div class="content">
            <h1>What are you listening to?</h1>

            <div class="categories">
                <div class="category closed">
                    <h3>
                        Theater / Cinema

                        <div class="arrow_container">
                            <div class="arrow1"></div>
                            <div class="arrow2"></div>
                        </div>
                    </h3>

                    <div class="music_list">
                        <div class="music_list_item">
                            <h4>Harry Potter</h4>
                            <p>Hedwig's Theme</p>
                        </div>

                        <div class="music_list_item">
                            <h4>Marvel</h4>
                            <p>X Gon Give It To Ya</p>
                        </div>
                    </div>
                </div>

                <div class="category closed">
                    <h3>
                        Opera

                        <div class="arrow_container">
                            <div class="arrow1"></div>
                            <div class="arrow2"></div>
                        </div>
                    </h3>

                    <div class="music_list">
                        <div class="music_list_item">
                            <h4>Carmen</h4>
                            <p>Habanera</p>
                        </div>
                    </div>
                </div>

                <div class="category closed">
                    <h3>
                        Classical Music

                        <div class="arrow_container">
                            <div class="arrow1"></div>
                            <div class="arrow2"></div>
                        </div>
                    </h3>

                    <div class="music_list">
                        <div class="music_list_item">
                            <h4>Ludovico Einaudi</h4>
                            <p>Una Mattina</p>
                        </div>

                        <div class="music_list_item">
                            <h4>Beethoven</h4>
                            <p>Für Elise</p>
                        </div>

                        <div class="music_list_item">
                            <h4>Mozart</h4>
                            <p>Lacrimosa</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('partials/toilet')

    </main>
@endsection
