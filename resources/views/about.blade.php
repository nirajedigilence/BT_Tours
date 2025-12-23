@extends('layouts.front')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/bowlingtours__style-css-about.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/bowlingtours__assets__css__custom-css-responsive.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/mediaelement/wp-mediaelement.min.css?ver=6.2.6') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/mediaelement/mediaelementplayer-legacy.min.css?ver=4.2.17') }}">
<script type='text/javascript' id='mediaelement-core-js-before'>
var mejsL10n = {"language":"en","strings":{"mejs.download-file":"Download File","mejs.install-flash":"You are using a browser that does not have Flash player enabled or installed. Please turn on your Flash player plugin or download the latest version from https:\/\/get.adobe.com\/flashplayer\/","mejs.fullscreen":"Fullscreen","mejs.play":"Play","mejs.pause":"Pause","mejs.time-slider":"Time Slider","mejs.time-help-text":"Use Left\/Right Arrow keys to advance one second, Up\/Down arrows to advance ten seconds.","mejs.live-broadcast":"Live Broadcast","mejs.volume-help-text":"Use Up\/Down Arrow keys to increase or decrease volume.","mejs.unmute":"Unmute","mejs.mute":"Mute","mejs.volume-slider":"Volume Slider","mejs.video-player":"Video Player","mejs.audio-player":"Audio Player","mejs.captions-subtitles":"Captions\/Subtitles","mejs.captions-chapters":"Chapters","mejs.none":"None","mejs.afrikaans":"Afrikaans","mejs.albanian":"Albanian","mejs.arabic":"Arabic","mejs.belarusian":"Belarusian","mejs.bulgarian":"Bulgarian","mejs.catalan":"Catalan","mejs.chinese":"Chinese","mejs.chinese-simplified":"Chinese (Simplified)","mejs.chinese-traditional":"Chinese (Traditional)","mejs.croatian":"Croatian","mejs.czech":"Czech","mejs.danish":"Danish","mejs.dutch":"Dutch","mejs.english":"English","mejs.estonian":"Estonian","mejs.filipino":"Filipino","mejs.finnish":"Finnish","mejs.french":"French","mejs.galician":"Galician","mejs.german":"German","mejs.greek":"Greek","mejs.haitian-creole":"Haitian Creole","mejs.hebrew":"Hebrew","mejs.hindi":"Hindi","mejs.hungarian":"Hungarian","mejs.icelandic":"Icelandic","mejs.indonesian":"Indonesian","mejs.irish":"Irish","mejs.italian":"Italian","mejs.japanese":"Japanese","mejs.korean":"Korean","mejs.latvian":"Latvian","mejs.lithuanian":"Lithuanian","mejs.macedonian":"Macedonian","mejs.malay":"Malay","mejs.maltese":"Maltese","mejs.norwegian":"Norwegian","mejs.persian":"Persian","mejs.polish":"Polish","mejs.portuguese":"Portuguese","mejs.romanian":"Romanian","mejs.russian":"Russian","mejs.serbian":"Serbian","mejs.slovak":"Slovak","mejs.slovenian":"Slovenian","mejs.spanish":"Spanish","mejs.swahili":"Swahili","mejs.swedish":"Swedish","mejs.tagalog":"Tagalog","mejs.thai":"Thai","mejs.turkish":"Turkish","mejs.ukrainian":"Ukrainian","mejs.vietnamese":"Vietnamese","mejs.welsh":"Welsh","mejs.yiddish":"Yiddish"}};
</script>
<script type='text/javascript' src="{{ asset('css/mediaelement/mediaelement-and-player.min.js?ver=4.2.17') }}" id='mediaelement-core-js'></script>
<script type='text/javascript' src="{{ asset('css/mediaelement/mediaelement-migrate.min.js?ver=6.2.6') }}" id='mediaelement-migrate-js'></script>
<script type='text/javascript' id='mediaelement-js-extra'>
/* <![CDATA[ */
var _wpmejsSettings = {"pluginPath":"\/css\/mediaelement\/","classPrefix":"mejs-","stretching":"responsive","audioShortcodeLibrary":"mediaelement","videoShortcodeLibrary":"mediaelement"};
/* ]]> */
</script>
<script type='text/javascript' src="{{ asset('css/mediaelement/wp-mediaelement.min.js?ver=6.2.6') }}" id='wp-mediaelement-js'></script>
<script type='text/javascript' src="{{ asset('css/mediaelement/renderers/vimeo.min.js?ver=4.2.17') }}" id='mediaelement-vimeo-js'></script>
<div class="notIndexContainer">
    <div class="banner_inner ">
        <div class="about_caption">
        <h1>The no. 1 provider of high-quality bowls holidays</h1>
        </div>
        <div class="static_banner"><img src="{{ asset('images/aboutus/About-us-Main-Image-min-e1545384854496.jpg') }}"></div>
    </div>

    <div class="about_bowling">
        <div class="about_bowling_left">
            <div style="width: 1170px;" class="wp-video"><!--[if lt IE 9]><script>document.createElement('video');</script><![endif]-->
                <video id="my-video" width="640" height="360" controls preload="none">
                  <source src="{{ asset('images/aboutus/Cranleigh-Bowls-Festival-May-2018.mp4') }}" type="video/mp4">
                  Your browser does not support the video tag.
                </video>
            </div>
                </div>
                <div class="about_bowling_right">
                    <h3>About Us</h3>
        <h4>Effortless Bowling Tours for Your Club</h4>
        <p>With over 20 years of expertise, we’ve been the trusted partner of UK Bowling Clubs for seamless, enjoyable experiences. We take care of every detail, from hotel bookings to transportation and fixtures, thanks to our strong connections in the industry.</p>
        <p>Our commitment? To make your club’s bowls tour experience worry-free and memorable, with our expert team on hand to solve any problems.</p>
                </div>
                <div class="clr"></div>
            </div>

    <div class="our_vision">
        <div class="our_vision_left">
            <h3>Our Vision</h3>
            <h4>Empowering Your Club Through Quality, Choice, and Community</h4>
            <p>Our mission is to enrich your club’s experience by offering high-quality accommodation, diverse destinations, and active community support to boost bowls memberships. With our expert team guiding you through the planning process, we ensure a smooth and unforgettable journey for your club.</p>
        </div>
        <div class="our_vision_right">
            <img src="{{ asset('images/aboutus/About-Bowling-Tours-min.jpg') }}">
        </div>
        <div class="clr"></div>
    </div>

    <div class="about_bowling">
        <div class="about_bowling_left">
            <img src="{{ asset('images/aboutus/Bringing-Bowls-to-All-min.jpg')}}">
        </div>
        <div class="about_bowling_right">
            <h3>Our Community</h3>
        <h4>Connecting and Growing the Bowls Community</h4>
        <p>Our passion for bowls extends beyond unforgettable tours. We help clubs connect and thrive by offering valuable resources to enhance their membership. By fostering stronger connections and supporting growth, we’re dedicated to revitalizing the bowls community for years to come.</p>
        </div>
        <div class="clr"></div>
    </div>

    <div class="home_body">
        <!-- <div class="tour_news_listing">
            <h3>Latest Bowling Tours News</h3>
            <div id="tour_news" class="owl-carousel">
                            </div>
            <div class="clr"></div>
        </div> -->
        
    <div class="community_box">
        <div class="community_box_left">
            <div class="community_left"><img src="{{ asset('images/aboutus/balb-pic.png')}}"></div>
            <div class="community_right">
                <h4>Care</h4>
                <p>Expert-picked hotels &amp; modern coaches for your comfort</p>
            </div>
            <div class="clr"></div>
        </div>
        <div class="community_box_left">
            <div class="community_left"><img src="{{ asset('images/aboutus/admin-pic.png')}}" style="margin:4px 0px 0px;"></div>
            <div class="community_right">
                <h4>Community</h4>
                <p>Supporting local clubs, making a difference together</p>
            </div>
            <div class="clr"></div>
        </div>
        <div class="community_box_left community_box_bdr">
            <div class="community_left"><img src="{{ asset('images/aboutus/icon-choice.png')}}"></div>
            <div class="community_right">
                <h4>Choice</h4>
                <p>Discover vibrant, stunning destinations for your club</p>
            </div>
            <div class="clr"></div>
        </div>
        <div class="clr"></div>
    </div> 
      </div>
</div>
<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function () {
    const players = document.querySelectorAll('video');

    players.forEach(function (player) {
      if (!player.closest('.mejs__container')) {
        new MediaElementPlayer(player, {
          pluginPath: 'https://cdn.jsdelivr.net/npm/mediaelement@4.2.16/build/',
          shimScriptAccess: 'always'
        });
      }
    });
  });
</script>
@endsection