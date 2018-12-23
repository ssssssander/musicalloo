<nav>
    <img class="nav-image" src="svg/navigation2.svg" alt="navigation">
    <a class="nav_item" href="{{ route('home') }}">
        <img src="{{ asset('graphics/icons/home.svg') }}" alt="homeIcon">
    </a>
    <a class="nav_item">
        <img src="{{ asset('graphics/icons/music_note.svg') }}" alt="musicIcon">
    </a>
    <a class="nav_item" href="{{ route('map') }}">
        <img src="{{ asset('graphics/icons/marker.svg') }}" alt="markerIcon">
    </a>
    <a class="nav_item" href="{{ route('faq') }}">
        <img src="{{ asset('graphics/icons/faq.svg') }}" alt="faqIcon">
    </a>
    <a class="nav_item" href="{{ route('contact') }}">
        <img src="{{ asset('graphics/icons/mail.svg') }}" alt="mailIcon">
    </a>
</nav>