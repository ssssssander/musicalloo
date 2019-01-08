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
                <div class="goal_borders">
                    <p><strong>General Enhancement</strong></p>
                    <p>Firstly, Musicalloo can be used  as a general way to provide toilet visitors with an enhanced experience. An example situation could be a mall, where toilets are in constant use, and often have to be paid for, making people expect a more luxurious experience. </p>
                </div>
            </div>
            
            <div class="content goal_div">
                <div class="goal_borders second">
                    <p><strong>Marketing Stunt</strong></p>
                    <p>Secondly, Musicalloo can be used for marketing. And example situation could be a theater, where the toilets can play songs which will immediately remind visitors of certain movies, without seeming like advertisement at all.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="cp" class="home-section styleguide cp">
        <div class="content-wrapper">
            <div class="content">
                <h2>Content</h2>
                <p>Simplicity and consistency are key. <br>By doing this, we strive to be accessible to everyone. <br>If you can write it in less words, do so.</p>
            </div>
        </div>
    </section>

    <section id="cp" class="home-section styleguide cp personality">
        <div class="content-wrapper">
            <div class="content">
                <h2>Personality</h2>

                <h4>Overview:</h4>
                <p>Musicalloo is fun, clean and simple. As one would hope for any toilet (or toilet related) experience to be.</p>

                <h4>Brand Traits:</h4>
                <p>We are simple, easy, accessible, fun, spontaneous and light-hearted.<br>Musicallo is NOT complex or overly serious.</p>

                <h4>Personality Map:</h4>
                <p>Musicalloo is very friendly and playful. It is neither very sumbissive or very dominant, but more on an equal foot with it's user.</p>

                <h4>Voice:</h4>
                <p>The voice of our brand is light-hearted and fun, like talking to a young friend. It conveys that we are bringing a little bit of delight in unexpected ways. Be careful not to sound either over-excited or under-excited.</p>
            </div>
        </div>
    </section>

    <section id="design" class="home-section styleguide design centered">
        <div class="content-wrapper">
            <div class="content">
                <h2>Design</h2>

                <div class="design_div">
                    <h3><a href="#design1">Logo</a></h3
                    ><h3><a href="#design2">Colors</a></h3
                    ><h3><a href="#design3">Typography</a></h3
                    ><h3><a href="#design4">Illustrations</a></h3
                    ><h3><a href="#design5">Spacing</a></h3
                    ><h3><a href="#design6">Forms</a></h3>
                </div>
            </div>
        </div>
    </section>

    <section id="design1" class="home-section styleguide design centered">
        <div class="content-wrapper">
            <div class="content title">
                <h4>Design: Logo</h4>
                <p>This is the Musicalloo logo. It's made entirely in greyscale, and it ends around the edges of the shape (there is no extra space around that is part of the logo itself, though in spacing there is more on this).</p>
            </div>

            <div class="image-wrapper logo">
                <img src="{{ asset('graphics/logo/logo.svg') }}">
            </div>

            <div class="content title title2">
                <p>DO NOT:</p>
                <p>Invert the logo, add color to the logo, rotate or skew the logo, <br>change the illustration in any way.</p>
            </div>

            <div class="image-wrapper logo logo2">
                <img src="{{ asset('graphics/logo/bad_logo1.svg') }}"
                ><img src="{{ asset('graphics/logo/bad_logo2.svg') }}"
                ><img src="{{ asset('graphics/logo/bad_logo3.svg') }}"
                ><img src="{{ asset('graphics/logo/bad_logo4.svg') }}">
            </div>
        </div>
    </section>

    <section id="design2" class="home-section styleguide design_colors centered">
        <div class="content-wrapper">
            <div class="content title">
                <h4>Design: Colors</h4>
                <p>Color consistency is very important. We use primarily greyscale, and colors are mostly used for illustrations or emphasis.</p>
                
                <div class="color_div">
                    <div class="color white">
                        <p>white<br>#FFFFFF</p>
                    </div>
                    <div class="color light_grey">
                        <p>light grey<br>#F0F0F0</p>
                    </div>
                    <div class="color grey">
                        <p>grey<br>#484848</p>
                    </div>
                </div
                
                ><div class="color_div middle">
                    <div class="color light_green">
                        <p>light green<br>#83AA97</p>
                    </div>
                    <div class="color green">
                        <p>green<br>#6E9683</p>
                    </div>
                    <div class="color dark_green">
                        <p>dark green<br>#5D7F6E</p>
                    </div>
                </div
                
                ><div class="color_div">
                    <div class="color yellow">
                        <p>yellow<br>#E5CC93</p>
                    </div>
                    <div class="color blue">
                        <p>blue<br>#6C94B7</p>
                    </div>
                    <div class="color dark_blue">
                        <p>dark blue<br>#3A445E</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="design3" class="home-section styleguide typography centered">
        <div class="content-wrapper">
            <div class="content title">
                <h4>Design: Typography</h4>

                <p>Musicalloo uses only one typeface, which is <a href="https://fonts.google.com/specimen/Nunito"> Nunito</a>, a free font from google.</p>

                <p class="typography_p">Guidelines for using Nunito:</p>
                <ul>
                    <li>Use Nunito for both headers and body text.</li>
                    <li>Use Nunito's Italic and Bold variations rather than applying an italic or bold styling to the regular font.</li>
                    <li>Fallback fonts: Verdana, sans-serif.</li>
                </ul>

                <p class="typography_p">Readability:</p>
                <ul>
                    <li>Don't use a font-size smaller than 9px to maintain readability.</li>
                    <li>Avoid using Nunito Extra-Light as it's very thing and the readability is low.</li>
                    <li>Always aim for well-contrasted text, meaning dark grey or black on light grey or white, or the inverse. Keep contrast in mind when combining colors with typography.</li>
                </ul>
            </div>
        </div>
    </section>

    <section id="design4" class="home-section styleguide illustrations centered">
        <div class="content-wrapper">
            <div class="content title">
                <h4>Design: Illustrations</h4>

                <p>When making illustrations in the style of Musicalloo, keep the color scheme in mind, but you may use other colors if they are complementary to the color scheme.</p>
                <p>When using text in the illustration, use the fontface Nunito (see typography).</p>
                <p>Illustrations are preferrably toilet-related, but this is not a requirement. Keep it fun an light-hearted.</p>
            </div>

            <div class="image-wrapper">
                <div>
                    <img src="{{ asset('graphics/wckot.svg') }}"
                    ><img src="{{ asset('graphics/wcpapier.svg') }}"
                    ><img src="{{ asset('graphics/wcborstel.svg') }}">
                </div>
            </div>
        </div>
    </section>

    <section id="design5" class="home-section styleguide spacing centered">
        <div class="content-wrapper">
            <div class="content title">
                <h4>Design: Spacing</h4>

                <p>As Musicalloo prefers a minimalistic appearance, spacing is very important. Large spacing is generally preferred over cramped spacing.</p>
                <p>When positioning illustrations next to text, always maintain enough spacing to provide good readability.</p>
                <p>The logo should have roughly its own width around it for "breathing room".</p>
            </div>

            <div class="image-wrapper">
                <div>
                    <img src="{{ asset('graphics/logo/logo_spacing.svg') }}"
                    >
                </div>
            </div>
        </div>
    </section>

    <section id="design6" class="home-section styleguide forms centered">
        <div class="content-wrapper">
            <div class="content title">
                <h4>Design: Forms</h4>

                <form id="contact-form">
                    <input type="text" placeholder="Keep it simple">
                    <textarea form="contact-form" placeholder="Keep it clear"></textarea>
                    <button type="submit">and add</button>
                    <button type="submit" class="blue_btn">a colorful</button>
                    <button type="submit" class="green_btn">button!</button>
                </form>
            </div>
        </div>
    </section>


@endsection
