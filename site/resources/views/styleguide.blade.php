@extends('layouts.app')

@section('title', 'Musicalloo')

@section('main')

    <div class="styleguide_nav">
        <p><a href="#styleguide_top">Musicalloo Style Guide</a></p>

        <a href="#basics">The Basics</a>
        <a href="#cp">Content &amp; Personality</a>
        <a href="#design">Design</a>
    </div>

    <section class="home-section styleguide centered" id="styleguide_top">
        <div class="content-wrapper">
            <div class="content">
                <h1>Musicalloo Style Guide</h1>

                <h3><a href="#basics">The Basics</a></h3>
                <h3><a href="#cp">Content &amp; Personality</a></h3>
                <h3><a href="#design">Design</a></h3>
            </div>
        </div>
    </section>

    <section id="basics" class="home-section styleguide">
        <div class="content-wrapper">
            <div class="image-wrapper">
                <img src="{{ asset('graphics/wckot.svg') }}" alt="toilet loft">
            </div>
            <div class="content">
                <h2>The Basics</h2>

                <h4>What is it?</h4>

                <p>Musicalloo is a device that exists of 3 main parts: a sensor, an arduino, and speakers. The sensor is triggered when someone is nearby, in this case using the toilet. The arduino handles the logic and stores the music files. The speakers provide the music.</p>
            </div>
        </div>
    </section>

    <section class="home-section styleguide basics">
        <div class="content-wrapper">
            <div class="content">
                <h2>The Basics</h2>
                <h4>Goals</h4>
            </div>

            <div class="content goal_div">
                <p><strong>General Enhancement</strong></p>
                <p>Firstly, Musicalloo can be used  as a general way to provide toilet visitors with an enhanced experience. An example situation could be a mall, where toilets are in constant use, and often have to be paid for, making people expect a more luxurious experience. </p>
            </div>
            
            <div class="content goal_div">
                <p><strong>Marketing Stunt</strong></p>
                <p>Secondly, Musicalloo can be used for marketing. And example situation could be a theater, where the toilets can play songs which will immediately remind visitors of certain movies, without seeming like advertisement at all.</p>
            </div>
        </div>
    </section>

    <section id="cp" class="home-section styleguide cp">
        <div class="content-wrapper">
            <div class="content">
                <h2>Content</h2>
                <p>Simplicity and consistency are key. <br>By doing this, we strive to be accessible to anyone. <br>If you can write it in less words, do so.</p>
            </div>
        </div>
    </section>

    <section id="cp" class="home-section styleguide cp personality">
        <div class="content-wrapper">
            <div class="content">
                <h2>Personality</h2>

                <h4>Overview:</h4>
                <p>Musicalloo is fun, clean and simple. As one would hope for any toilet (or toilet related) experience to be.</p>

                <h4>Braind Traits:</h4>
                <p>We are simple, easy, accessible, fun, spontaneous and light-hearted.<br>Musicallo is NOT complex or overly serious.</p>

                <h4>Personality Map:</h4>
                <p>Musicalloo is very friendly and playful. It is neither very sumbissive or very dominant, but more on an equal foot with it's user.</p>

                <h4>Voice:</h4>
                <p>The voice of our brand is light-hearted and fun, like talking to a young friend. It conveys that we are bringing a little bit of delight in unexpected ways. Be careful not to sound either over-excited or under-excited.</p>
            </div>
        </div>
    </section>

    <section id="design" class="home-section styleguide design">
        <div class="content-wrapper">
            <div class="content">
                <h2>Design</h2>
                <p>Simplicity and consistency are key. <br>By doing this, we strive to be accessible to anyone. <br>If you can write it in less words, do so.</p>
            </div>
        </div>
    </section>


@endsection
