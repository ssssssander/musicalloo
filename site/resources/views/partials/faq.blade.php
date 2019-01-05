<section class="faq-section" id="faq">
    <div class="content-wrapper">
        <img src="{{ asset('graphics/wcpapier.svg') }}" alt="toilet paper">
        <div class="content">
            <h1>How do we do it?</h1>
            <h3>Components</h3>
            <p>An <a href="https://www.arduino.cc/">arduino</a> with a wifi shield
            <br>An ultrasonic sensor
            <br>A speaker</p>

            <h3>How do we know you're there?</h3>
            <p>The ultrasonic sensor detects when something is in front of it. In this case, that something is you sitting on the loo. Don't worry, there's no camera or microphones at all.</p>

            <h3>How does it play music?</h3>
            <p> The music is saved on an SD card on the arduino, which is connected to speakers. Music can be manually put on the SD card or uploaded over wifi. When the proximity sensor detects someone doing their business, it sends a signal, and the appropriate music is played.</p>
        </div>
    </div>
</section>