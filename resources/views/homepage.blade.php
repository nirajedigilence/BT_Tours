@extends('layouts.front')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css">
<style type="text/css">
    p,h3,h1,div {
        font-family: 'Poppins',sans-serif !important;
    }
 .bowling-section {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    width: 100%;
    background-color: #ffffff;
    margin-top: 15px;
    margin-bottom: 30px;
    overflow: hidden;
}

.content {
    width: 45%;
    min-height: 420px;
    padding: 50px 30px 50px 110px;
    background: #1C92D0 0% 0% no-repeat padding-box;
    color: white;
    margin: 30px 0px;
}

.content h1 {
    margin-bottom: 35px;
    text-shadow: 2px 3px 1px #000;
    font: normal normal bold 74px / 90px Poppins;
}

.content p {
    font-size: 1.6rem;
    margin-bottom: 35px;
    color: #fff;
}

.buttons {
    display: flex;
    gap: 10px;
}
.buttons a {
    width: 320px;
}
.btn {
    display: inline-block;
    padding: 15px 20px;
    text-align: center;
    font-size: 1.4rem;
    font-weight: bold;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.discover-btn {
    background-color: #ffcb05;
    color: #fff;
}

.discover-btn:hover {
    background-color: #e0b800;
    color: #333 !important;
}


.enquire-btn {
    background-color: #ffffff;
    color: #000000;
    border: 2px solid #1C92D0;
}

.enquire-btn:hover {
    background-color: #e0e0e0;
}

.video-container {
    width: 55%;
    padding-left: 0px;
}

.video-container video {
    width: 100%;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
.bowls_video_left {
    margin: 0;
    padding: 0;
    width: 100%;
    height: 174px;
    float: left;
    display: flex;
    align-items: center;
    justify-content: center;
}
.quality-section {
    background-color: #ffffff;
    text-align: center;
    padding: 50px 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    margin: 20px auto;
    width: 100%;
    border-radius: 10px;
    background-color:#f5f5f5;
    margin-top: 50px;
}

.quality-section .content-quality h1 {
    font-size: 3.5rem;
    font-weight: 800;
    margin-bottom: 20px;
    color: #333;
}

.quality-section .content-quality p {
    font-size: 1.4rem;
    margin-bottom: 30px;
    color: #666;
}

.quality-section .btn-link {
    display: inline-block;
    padding: 15px 30px;
    background-color: #6AC0EC;
    color: white;
    font-size: 1rem;
    font-weight: bold;
    text-decoration: none;
    border-radius: 25px;
    transition: background-color 0.3s ease;
}

.quality-section .btn-link:hover {
    background-color: #357ABD;
}
.category-section {
            width: 100%;
            margin-top: 85px;
        }

        .header {
          margin-bottom: 20px;
          text-align: center;
      }

        .header h1 {
            font-size: 3.1rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: #333;
            margin: 0;
        }

        .header p {
            font-size: 1em;
            color: #777;
            margin: 5px 0;
        }

        .categories {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        /*.category {
            width: 300px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            transition: transform 0.3s;
        }*/
        .category {
            position: relative;
            border-radius: 10px;
            text-align: center;
            margin: 20px;
            height: 500px;
            opacity: 1;
            width: 26%;
        }
        .category::after {
            content: "";
            position: absolute;
            bottom: -26px;
            left: 6px;
            width: 100%;
            height: 6px;
            background-color: #FFD700;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .category::before {
            content: "";
            position: absolute;
            top: 13px;
            right: -6px;
            width: 7px;
            height: 512px;
            background-color: #FFD700;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }
      
        /*.category:hover {
            transform: translateY(-10px);
        }*/

        .category img {
            width: 100%;
            height: 520px;
            object-fit: cover;
            border-radius: 10px 10px 0px 10px;
        }

        /*.category p {
            position: absolute;
            bottom: -4px;
            margin: 0;
            padding: 5px 20px;
            color: #fff;
            border-radius: 5px;
            font: normal normal 600 30px / 30px Poppins;
            width: 100%;
            text-align: left;
        }*/
        .category p {
            position: absolute;
            bottom: -19px;
            margin: 0;
            padding: 26px 32px;
            color: #fff;
            font: normal normal 600 26px / 30px Poppins;
            width: 100%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.6), transparent);
            border-radius: 0px 0px 0px 10px;
            text-align: left;
        }
        .category-footer {
            margin-top: -100px;
            padding: 20px;
            background-color: #1C92D0;
            color: #fff;
            padding-top: 125px;
            text-align: center;
        }

      .category-footer a {
        display: inline-block;
        margin: 10px;
        padding: 10px 30px;
        background-color: #ffcc00;
        color: #fff;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
    }
        .category-footer a:hover {
            background-color: #e6b800;
        }
        p a:hover {
            text-decoration: none;
             color: #ffffff; 
        }
        .why-choose {
            background-color: #1C92D0;
            padding: 40px 20px;
            color: #fff;
            text-align: center;
        }

        .why-choose h2 {
            font-size: 3em;
            margin-bottom: 20px;
            font-weight: 800;
            text-shadow: 2px 3px 1px #000;
            font-style: italic;
        }

        .features {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top:50px;
        }
        .feature img{
            width: 77px;
            height: 93px;
        }
        .feature {
            position: relative;
            border-radius: 10px;
            padding: 56px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin: 20px;
            height: 400px;
            background: #FFFFFF 0% 0% no-repeat padding-box;
            opacity: 1;
            width: 380px;
        }
        .feature::after {
            content: "";
            position: absolute;
            bottom: -6px;
            left: 5px;
            width: 100%;
            height: 8px;
            background-color: #FFD700;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .feature::before {
            content: "";
            position: absolute;
            top: 6px;
            right: -5px;
            width: 8px;
            height: 100%;
            background-color: #FFD700;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }
        .feature h3 {
            font: normal normal 600 33px / 40px Poppins;
            letter-spacing: 0px;
            color: #32363A;
            margin: 10px 0;
        }

        .feature p {
            /* width: 313px; */
            text-align: center;
            font: normal normal normal 20px / 30px Poppins;
            letter-spacing: 0px;
            color: #32363A;
        }
        .testimonials-container {
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
            padding: 20px;
        }

        .testimonials-header h1 {
                /*font: normal normal 800 60px / 65px Poppins;
                letter-spacing: 0px;
                text-shadow: 0px 3px 6px #B9BABB;*/
                color: #32363A;
                
                font-size: 3.1rem;
                font-weight: 700;
        }

        .testimonials-header p {
            color: #666;
            font-size: 1rem;
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 85px;
            margin-bottom: 85px;
        }

        .testimonial-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            transition: transform 0.3s ease;
            text-align: left;
        }

        .testimonial-card:hover {
            transform: scale(1.05);
        }

        .testimonial-name {
            font: normal normal 600 18px/27px Poppins;
            margin-bottom: 5px;
        }

        .testimonial-club {
            font: normal normal normal 14px/21px Poppins;
            letter-spacing: 0.07px;
            color: #555;
            margin-bottom: 15px;
        }

        .testimonial-quote {
            color: #333;
            font: normal normal normal 18px/27px Poppins;
            margin-bottom: 10px;
        }

        .testimonial-stars {
            color: #65b5df;
            font-size: 1.2rem;
        }

        .quote-icon {
            font-size: 2rem;
            color: #00aaff;
            float: right;
        }
       /* .newsletter-section {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            width: 100%;
            border-top: 1px solid #f5f0f0;
        }

        .newsletter-content {
            width: 48%;
            padding-left: 120px;
        }
        .newsletter-content h1 {
            margin-bottom: 10px;
            color: #32363A;
            font-weight: 700;
            font-size: 3.1rem;
        }

        
        .newsletter-content p {
            color: #32363A;
            margin-bottom: 20px;
            font: normal normal 600 18px / 33px Poppins;
            letter-spacing: 0px;
        }


        .newsletter-form {
            display: flex    ;
            align-items: center;
            gap: 0px;
            margin-right: 275px;
        }

        .newsletter-button {
            padding: 10px 20px;
            font-size: 1rem;
            color: #fff;
            background-color: #1C92D0;
            border: 1px solid #1C92D0;
            border-radius: 0px 5px 5px 0px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .newsletter-input {
            flex: 1;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px 0px 0px 5px;
        }
        .newsletter-button:hover {
            background-color: #0056b3;
        }

        .newsletter-image {
            flex: 1 1 450px;
            width: 52%;
            text-align: center;
        }

        .newsletter-image img {
            width: 100%;
            object-fit: cover;
        }
        */
        .newsletter-section {
          position: relative;
          color: #fff;
        }

        .background-image {
            width: 100%;
            /*height: 700px;*/
            display: block;
            object-fit: cover;
        }

        .overlay {
            position: absolute;
            top: 35%;
            left: 5%;
            padding: 20px;
            border-radius: 8px;
        }

        .overlay h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            font-weight: 600;
            text-shadow:2px 3px 1px #000;
        }

        /* Input field styling */
        .newsletter-form input {
          padding: 10px 20px;
          font-size: 1rem;
          border: none;
          color:#000;
          min-width:350px;
        }

        .newsletter-form input::placeholder {
          color: #999; /* Placeholder text color */
        }

        /* Submit button styling */
        .newsletter-form button {
          padding: 10px 20px;
          font-size: 1rem;
          border: none;
          cursor: pointer;
          background-color: #1C92D0; /* Dark blue */
          color: #fff;
        }

        .newsletter-form button:hover {
          background-color: #1a252f; /* Darker blue on hover */
        }
        @media (max-width: 768px) {
            .newsletter-content h1 {
                font-size: 1.5rem;
            }

            .newsletter-content p {
                font-size: 0.9rem;
            }
            .bowling-section {
                flex-direction: column;
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            .newsletter-form {
                flex-direction: column;
            }

            .newsletter-button {
                width: 100%;
            }
        }
        @media (max-width: 768px) {
            .category {
                width: 100%;
                max-width: 300px;
            }
            .feature {
                width: 100%;
                max-width: 300px;
                height: auto;
            }
        }
        @media (max-width: 600px) {
            .quality-section .content h1 {
                font-size: 1.8rem;
            }

            .quality-section .content p {
                font-size: 1rem;
            }

            .quality-section .btn-link {
                padding: 10px 20px;
                font-size: 0.9rem;
            }
        }
        @media (max-width: 768px) {
            .bowling-section {
                flex-direction: column;
                text-align: center;
            }
            .footer {
                flex-direction: column;
            }   
            .content {
                margin-right: 0;
                margin-bottom: 20px;
                width: 100%;
                padding:50px;
            }
            .video-container {
                width: 90%;
                padding-left: 0px;
            }
            .content h1 {
            margin-bottom: 35px;
            text-shadow: 2px 3px 1px #000;
            font: normal normal bold 54px / 68px Poppins !important;
        }
        }
</style>
<div class="notIndexContainer">
      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-error">{{ session('error') }}</div>
    @endif
  <section class="bowling-section">
        <div class="content">
            <h1>Bowling Holidays<br>Reimagined</h1>
            <p>Discover the perfect lawn bowls tour destination for your club. Explore all the best bowls holidays below!</p>
            <div class="buttons">
                <a href="/search" class="btn discover-btn">Discover Now</a>
                <!-- <a href="#" class="btn enquire-btn">Enquire</a> -->
            </div>
        </div>
        <div class="video-container">
            
            <div class="bowls_video_left">
              
               <video style="width: 100%;" id="video1" autoplay muted loop onclick="playPause()" >
                  <source src="{{ asset('images/homepage/Bowling_Tours_video.mp4') }}" type="video/mp4">
                </video> 
        
            </div>
        </div>
  </section>
  <section class="quality-section">
        <div class="content-quality">
            <h1>We are the No. 1 Provider of<br>Quality Bowling Holidays!</h1>
            <p>With over 20 years of expertise we're passionate about helping clubs<br> like yours organise an exceptional, personalised bowls holiday!</p>
            <!-- <a href="/search" class="btn-link">Discover all destinations</a> -->
        </div>
  </section>
  <section class="category-section">
      <!-- <div class="header">
          <h1>Most picked categories</h1>
          <p>Those are the top sellers</p>
      </div> -->
    
      <div class="categories">
          <div class="category">
            <a href="/search?category=indoor">
              <img src="{{ asset('images/homepage/c1.png') }}" alt="Indoor">
              <div class="c-title"><p>Indoor</p></div>
            </a>
          </div>
          <div class="category">
            <a href="/search?category=outdoor">
              <img src="{{ asset('images/homepage/c2.png') }}" alt="Outdoor">
              <div class="c-title"><p>Outdoor</p></div>
            </a>
          </div>
          <div class="category">
            <a href="/search?category=premium">
              <img src="{{ asset('images/homepage/c3.png') }}" alt="Premium">
              <div class="c-title"><p>Premium</p></div>
            </a>
          </div>
      </div>
      <div class="category-footer">
          <p style="color: #fff;margin-top: 70px;"><!-- Why not have a look at all of our tours?  --><a href="/search">View More Destinations</a></p>
          <div class="why-choose">
            <h2>Why choose us...?</h2>
            <div class="features">
                <div class="feature">
                    <img src="{{ asset('images/homepage/t3.png') }}" alt="Hotel Icon">
                    <h3>Top Quality Hotels</h3>
                    <p>Handpicked 4 & 3-star hotels that deliver exceptional service</p>
                </div>
                <div class="feature">
                  <img src="{{ asset('images/homepage/t2.png') }}" alt="Coach Icon">
                  <h3>Exclusive Coach Hire</h3>
                  <p>Full use of the coach throughout the tour for fixtures and in your free time!</p>
              </div>
              <div class="feature">
                  <img src="{{ asset('images/homepage/t1.png') }}" alt="Fixtures Icon">
                  <h3>The Best Local Fixtures</h3>
                  <p>Play at our partner clubs known for their top greens and friendly hosts!</p>
              </div>
            </div>
        </div>
      </div>
  </section>
  <section class="testimonials-container">
      <!-- <div class="testimonials-header">
          <h1>Testimonials from our<br>Satisfied guests!</h1>
          <p>Hear what our guests loved about their tour with us!</p>
      </div> -->

      <div class="testimonials-grid">
          <div class="testimonial-card">
              <span class="quote-icon"><img src="{{ asset('images/homepage/q1.png') }}" alt="Fixtures Icon"></span>
              <div class="testimonial-name">Pat</div>
              <div class="testimonial-club">West Hoathly BC</div>
              <div class="testimonial-quote">
                  "Bowling Tours were excellent. Very helpful and able to answer all my questions during the booking process. Very straightforward!"
              </div>
              <div class="testimonial-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
          </div>

          <div class="testimonial-card">
              <span class="quote-icon"><img src="{{ asset('images/homepage/q1.png') }}" alt="Fixtures Icon"></span>
              <div class="testimonial-name">Judith</div>
              <div class="testimonial-club">Riverain BC</div>
              <div class="testimonial-quote">
                  "Exceptional help from Bowling Tours. Excellent food, extremely helpful driver and the fixtures made us very welcome."
              </div>
              <div class="testimonial-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
          </div>

          <div class="testimonial-card">
              <span class="quote-icon"><img src="{{ asset('images/homepage/q1.png') }}" alt="Fixtures Icon"></span>
              <div class="testimonial-name">Valerie</div>
              <div class="testimonial-club">Hedge End BC</div>
              <div class="testimonial-quote">
                  "Bowling Tours were first class & very prompt in helping us. The hotel was high quality & the food was exceptionally good."
              </div>
              <div class="testimonial-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
          </div>
      </div>
  </section>
  <!-- <section class="newsletter-section">
      <div class="newsletter-content">
          <h1>Sign up for our newsletter</h1>
          <p>Stay on top of the bowling news! Enter your <br>email below</p>
          <div class="feature-email">
          <form class="newsletter-form" id="newsletter-form">
              <input
                  type="email" name="newsletter_email" id="newsletter-email"
                  class="newsletter-input"
                  required
              />
              <button type="button" id="newsletter-submit" class="newsletter-button">SIGN UP</button>
          </form>
          <div id="newsletter-message"></div>
          </div>
      </div>
      <div class="newsletter-image">
          <img src="{{ asset('images/homepage/n1.jpg') }}" alt="Newsletter Image" />
      </div>
  </section> -->
 
  <section class="newsletter-section" style="position: relative;z-index: 2;margin-bottom: -250px;">
    <img src="{{ asset('images/homepage/n1.jpg') }}" alt="Bowling background" class="background-image">
    <div class="overlay">
      <h1>Sign up for our <br>newsletter</h1>
      <form class="newsletter-form" method="post" action="{{route('newsletter.subscribe')}}" id="newsletter-form" style="display: inline-flex;">
        @csrf
          <input type="email" required name="email" id="newsletter-email" placeholder="type your email address here" style="border-top-left-radius: 5px;border-bottom-left-radius: 5px;">
          <button type="submit" id="newsletter-submit" style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;">SIGN UP</button>
        </form>
        <div id="newsletter-message"></div>
    </div>
  </section>
</div>
<style type="text/css">
  .select2-container--default .select2-selection--single{
    border: none!important;
  }
</style>


<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js'></script>
<script type="text/javascript">

  (function($){

    $.session = {

        _id: null,

        _cookieCache: undefined,

        _init: function()
        {
            if (!window.name) {
                window.name = Math.random();
            }
            this._id = window.name;
            this._initCache();

            // See if we've changed protcols

            var matches = (new RegExp(this._generatePrefix() + "=([^;]+);")).exec(document.cookie);
            if (matches && document.location.protocol !== matches[1]) {
               this._clearSession();
               for (var key in this._cookieCache) {
                   try {
                   window.sessionStorage.setItem(key, this._cookieCache[key]);
                   } catch (e) {};
               }
            }

            document.cookie = this._generatePrefix() + "=" + document.location.protocol + ';path=/;expires=' + (new Date((new Date).getTime() + 120000)).toUTCString();

        },

        _generatePrefix: function()
        {
            return '__session:' + this._id + ':';
        },

        _initCache: function()
        {
            var cookies = document.cookie.split(';');
            this._cookieCache = {};
            for (var i in cookies) {
                var kv = cookies[i].split('=');
                if ((new RegExp(this._generatePrefix() + '.+')).test(kv[0]) && kv[1]) {
                    this._cookieCache[kv[0].split(':', 3)[2]] = kv[1];
                }
            }
        },

        _setFallback: function(key, value, onceOnly)
        {
            var cookie = this._generatePrefix() + key + "=" + value + "; path=/";
            if (onceOnly) {
                cookie += "; expires=" + (new Date(Date.now() + 120000)).toUTCString();
            }
            document.cookie = cookie;
            this._cookieCache[key] = value;
            return this;
        },

        _getFallback: function(key)
        {
            if (!this._cookieCache) {
                this._initCache();
            }
            return this._cookieCache[key];
        },

        _clearFallback: function()
        {
            for (var i in this._cookieCache) {
                document.cookie = this._generatePrefix() + i + '=; path=/; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
            }
            this._cookieCache = {};
        },

        _deleteFallback: function(key)
        {
            document.cookie = this._generatePrefix() + key + '=; path=/; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
            delete this._cookieCache[key];
        },

        get: function(key)
        {
            return window.sessionStorage.getItem(key) || this._getFallback(key);
        },

        set: function(key, value, onceOnly)
        {
            try {
                window.sessionStorage.setItem(key, value);
            } catch (e) {}
            this._setFallback(key, value, onceOnly || false);
            return this;
        },
        
        'delete': function(key){
            return this.remove(key);
        },

        remove: function(key)
        {
            try {
            window.sessionStorage.removeItem(key);
            } catch (e) {};
            this._deleteFallback(key);
            return this;
        },

        _clearSession: function()
        {
          try {
                window.sessionStorage.clear();
            } catch (e) {
                for (var i in window.sessionStorage) {
                    window.sessionStorage.removeItem(i);
                }
            }
        },

        clear: function()
        {
            this._clearSession();
            this._clearFallback();
            return this;
        }

    };

    $.session._init();

})(jQuery);
  
  
  jQuery('.tours_wrapper_nav ul li').click(function(){
    if(jQuery('.top_tab_content').length){
        index = jQuery(this).index('.tours_wrapper_nav ul li');
        jQuery.session.set('toursSlider', index);
    }
  });
jQuery(window).load(function(){
    if(jQuery('.top_tab_content').length){
      var index = jQuery.session.get('toursSlider');
      setTimeout("jQuery('.tours_wrapper_nav ul li:eq("+index+")').trigger('click');",1100);
    }
  });

  var myVideo = document.getElementById("video1"); 

function playPause() { 
  if (myVideo.paused){ 
    jQuery('#video1').attr('controls',''); 
    myVideo.play(); 
    jQuery('.playp').hide();
  }else{
    jQuery('#video1').removeAttr('controls'); 
    myVideo.pause(); 
    jQuery('.playp').show();
  }
} 
     jQuery(".banner_form_field_box").on('click',function(){
       jQuery(this).find('select').trigger('click');
       });

    jQuery('#types').select2({
        placeholder: "Select Type",
        minimumResultsForSearch: -1,
        templateResult: formatState,
        templateSelection: formatState,
        dropdownAutoWidth : true
    });

    function addIcons(opt) {
        if (!opt.id) {
            return opt.text;
        }

        var optimage = opt.attr('data-image');
        var $opt = jQuery(
                '<span><img src="' + optimage + '" class="img-flag" style="width:15px!important;display: inline-block!important;"/> ' + opt.text + '</span>'
                );
        return $opt;
    }

    function formatState (opt) {
        if (!opt.id) {
            return opt.text.toLowerCase();
        }

        var optimage = jQuery(opt.element).attr('data-image');
        console.log(optimage)
        if(!optimage){
           return opt.text.toLowerCase();
        } else {
            var $opt = jQuery(
               '<span><img src="' + optimage + '" style="width:15px!important;display: inline-block!important;"/> ' + opt.text.toLowerCase() + '</span>'
            );
            return $opt;
        }
    };
</script>
@endsection