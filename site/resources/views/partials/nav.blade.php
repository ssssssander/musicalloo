<nav class="closed" id="nav">
    <img class="nav-image" src="{{ asset('graphics/nav.svg') }}" alt="navigation">

    <div id="img_tap_div"></div>

    <a class="nav_item" href="{{ route('home') }}">
        <img src="{{ asset('graphics/icons/outlines/home.svg') }}" alt="homeIcon">
    </a>
    <a class="nav_item">
        <img src="{{ asset('graphics/icons/outlines/music_note.svg') }}" alt="musicIcon">
    </a>
    <a class="nav_item" href="{{ route('map') }}">
        <img src="{{ asset('graphics/icons/outlines/marker.svg') }}" alt="markerIcon">
    </a>
    <a class="nav_item" href="{{ route('faq') }}">
        <img src="{{ asset('graphics/icons/outlines/faq.svg') }}" alt="faqIcon">
    </a>
    <a class="nav_item" href="{{ route('contact') }}">
        <img src="{{ asset('graphics/icons/outlines/mail.svg') }}" alt="mailIcon">
    </a>
</nav>