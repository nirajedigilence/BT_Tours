@extends('layouts.front')

@section('content')
<style>
    .body_container h4 {
    margin: 0 0 10px;
    padding: 0;
    color: #6ac0ec;
    font-size: 20px;
    font-weight: 500;
}
.body_container p {
    margin: 0;
    padding: 0 0 15px;
    color: #363737;
    font-size: 15px;
    font-weight: 500;
}
.about_bowling {
    margin: 0 auto;
    padding: 40px 0;
    width: 1250px;
}
.about_bowling p {
    margin: 0 0 10px;
    padding: 0;
    color: #363737;
    font-size: 15px;
    font-weight: 500;
}
.about_bowling li {
    margin: 0 0 10px;
    padding: 0;
    color: #363737;
    font-size: 15px;
    font-weight: 500;
}
a:hover {
    text-decoration: none;
    color: #cb0202;
}
a{
    color: #363737;
}
ol li {
    text-decoration: none !important;
}

</style>
<link rel="stylesheet" type="text/css" href="{{ asset('css/bowlingtours__style-css-contact.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/contact-responsive.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
<div class="notIndexContainer" style="padding: 5px;">
<div class="banner_inner ni-img">
<div class="about_caption">
<h1>Cookies</h1>
</div>
<div class="static_banner"><img src=""></div>
</div>
<div class="about_bowling">
            <p>Cookies are small text files stored on your computer by your browser. They’re used for many things, such as remembering whether you’ve visited the site before, so that you remain logged in – or to help us work out how many new website visitors we get each month. They contain information about the use of your computer but don’t include personal information about you (they don’t store your name, for instance).</p>
<p>This policy explains how cookies are used on Bowling Tours websites in general – and, below, how you can control the cookies that may be used on this site (not all of them are used on every site).</p>
<h3>About this Cookie policy</h3>
<p>This Cookie Policy applies to all of our websites and our mobile applications (“the Website”).</p>
<p>In this Cookie Policy, when we refer to any of our Websites, we mean any website or mobile application operated by or on behalf of Bowling Tours or its subsidiaries and affiliates (collectively “Bowling Tours”), regardless of how you access the network. This Cookie Policy forms part of and is incorporated into our Website Terms and Conditions.</p>
<p>By accessing the Website, you agree that this Cookie Policy will apply whenever you access the Website on any device.<br>
Any changes to this policy will be posted here. We reserve the right to vary this Cookie Policy from time to time and such changes shall become effective as soon as they are posted. Your continued use of the Website constitutes your agreement to all such changes.</p>
<h3>Our use of cookies</h3>
<p>We may collect information automatically when you visit the Website, using cookies.</p>
<p>The cookies allow us to identify your computer and find out details about your last visit.</p>
<p>You can choose, below, not to allow cookies. If you do, we can’t guarantee that your experience with the Website will be as good as if you do allow cookies.</p>
<p>The information collected by cookies does not personally identify you; it includes general information about your computer settings, your connection to the Internet e.g. operating system and platform, IP address, your browsing patterns and timings of browsing on the Website and your location.</p>
<p>Most internet browsers accept cookies automatically, but you can change the settings of your browser to erase cookies or prevent automatic acceptance if you prefer.</p>
<p>The following types of cookie are used on this site. We don’t list every single cookie used by name – but for each type of cookie we tell you how you can control its use.</p>
<h4>Personalisation cookies</h4>
<p>These cookies are used to recognise repeat visitors to the Website and in conjunction with other information we hold to attempt to record specific browsing information (that is, about the way you arrive at the Website, pages you view, options you select, information you enter and the path you take through the Website). These are used to recommend content we think you’ll be interested in based on what you’re looked at before.</p>
<h4>Analytics cookies</h4>
<p>These monitor how visitors move around the Website and how they reached it. This is used so that we can see total (not individual) figures on which types of content users enjoy most, for instance. You can opt out of these if you want.</p>
<h4>Third-party service cookies</h4>
<p>Social sharing, video and other services we offer are run by other companies. These companies may drop cookies on your computer when you use them on our site or if you are already logged in to them.</p>
<p>Here is a list of places where you can find out more about specific services that we may use and their use of cookies:</p>
<p>Facebook’s data use policy:&nbsp;<a href="http://www.facebook.com/about/privacy/your-info-on-other">http://www.facebook.com/about/privacy/your-info-on-other</a></p>
<p>AddThis (the service that runs some of our social sharing buttons):&nbsp;<a href="http://www.addthis.com/privacy">http://www.addthis.com/privacy</a></p>
<p>Twitter’s privacy policy:&nbsp;<a href="https://twitter.com/privacy">https://twitter.com/privacy</a></p>
<p>YouTube video player cookie policy:&nbsp;<a href="https://privacy.google.com/">https://privacy.google.com</a>&nbsp;(Google’s standard terms).</p>
<h4>Our own ad serving and management cookies</h4>
<p>From time to time we sell space on some of our websites to advertisers – they pay for the content you enjoy for free.</p>
<p>As part of this, we use several services to help us and advertisers understand what adverts you might be interested in. These cookies hold information about the computer – they don’t hold personal information about you (ie it’s not linked to you as an individual). But they might hold a record of what other websites you’ve looked at – so we could show you a car advert if you’ve previously visited a motoring website.</p>
<p>These are the services we use and how you can control those cookies. Please note that turning off advertising cookies won’t mean that you are not served any advertising merely that it will not be tailored to your interests.</p>
<p>Doubleclick (advertising): Privacy policy at&nbsp;<a href="http://www.google.com/doubleclick/privacy/">http://www.google.com/doubleclick/privacy/</a></p>
<p>Google Adsense (ad partner): Privacy policy at&nbsp;<a href="https://support.google.com/adsense/answer/1348695?hl=en-GB">https://support.google.com/adsense/answer/1348695?hl=en-GB</a></p>
<h4>Other ad management cookies</h4>
<p>Advertisements on the Website are provided by other organisations. Our advertising partners will serve advertisements that they believe are most likely to be of interest to you, based on information about your visit to the Website and other websites. In order to do this, our advertising partner may need to place a cookie on your computer. These cookies hold information about the computer – they don’t hold personal information about you (ie it’s not linked to you as an individual).</p>
<p>For more information about this type of online behavioural advertising, about cookies, and about how to turn this feature off, please visit&nbsp;<a href="http://www.youronlinechoices.com/uk/">http://www.youronlinechoices.com/uk/</a></p>
<p>Please note that turning off advertising cookies won’t mean that you are not served any advertising merely that it will not be tailored to your interests.</p>
<h4>Site management cookies</h4>
<p>These are used to maintain your identity or session on the Website. For instance, where our websites run on more than one server, we use a cookie to ensure that you are sent information by one specific server (otherwise you may log in or out unexpectedly). We may use similar cookies when you vote in opinion polls to ensure that you can only vote once, and to ensure that you can use our commenting functionality when not logged in (to ensure you don’t see comments you’ve reported as abusive, for instance, or don’t vote comments up/down more than once).</p>
<p>These cookies cannot be turned off individually but you could change your browser setting to refuse all cookies (see above) if you do not wish to accept them.</p>
        <div class="clr"></div>
    </div>
<style type="text/css">
/*h2 {
    font-family: Arial, Verdana;
    font-weight: 800;
    font-size: 2.5rem;
    color: #091f2f;
    text-transform: uppercase;
}*/
.panel-group .panel {
    padding: 6px 6px 6px 6px;
}
.accordion-section .panel-default > .panel-heading {
    border: 0;
    background: #ffffff;
    padding: 0;
    height: auto;
}
.accordion-section .panel-default .panel-title a {
    display: block;
    font-style: italic;
    font-size: 1.5rem;
}
.accordion-section .panel-default .panel-title a:after {
    font-family: 'FontAwesome';
    font-style: normal;
    font-size: 3rem;
    content: "\f106";
    color: #1f7de2;
    float: right;
    /*margin-top: -18px;*/
    line-height: 15px;
}
.accordion-section .panel-default .panel-title a.collapsed:after {
    content: "\f107";
}
.accordion-section .panel-default .panel-body {
    font-size: 1.2rem;
}
.about_bowling h3 {
    margin: 0 0 15px;
    padding: 0;
    color: #2191cd;
    font-size: 38px;
    font-weight: 500;
    text-transform: capitalize;
}
.about_bowling h4 {
    font-size: 18px;
    color: #000000;
    font-family: inherit;
    font-weight: 500;
    line-height: 1.1;
}
</style>

<div class="clr"></div>




<div class="home_body">

    <div class="community_box">
        <div class="community_box_left">
            <div class="community_left"><img src="https://bowlingtours-staging-co-uk.stackstaging.com/wp-content/themes/bowlingtours/assets/images/balb-pic.png"></div>
            <div class="community_right">
                <h4>Care</h4>
                <p>Expert-picked hotels &amp; modern coaches for your comfort</p>
            </div>
            <div class="clr"></div>
        </div>
        <div class="community_box_left">
            <div class="community_left"><img src="https://bowlingtours-staging-co-uk.stackstaging.com/wp-content/themes/bowlingtours/assets/images/admin-pic.png" style="margin:4px 0px 0px;"></div>
            <div class="community_right">
                <h4>Community</h4>
                <p>Supporting local clubs, making a difference together</p>
            </div>
            <div class="clr"></div>
        </div>
        <div class="community_box_left community_box_bdr">
            <div class="community_left"><img src="https://bowlingtours-staging-co-uk.stackstaging.com/wp-content/themes/bowlingtours/assets/images/icon-choice.png"></div>
            <div class="community_right">
                <h4>Choice</h4>
                <p>Discover vibrant, stunning destinations for your club</p>
            </div>
            <div class="clr"></div>
        </div>
        <div class="clr"></div>
    </div>
  <div class="clr"></div>
</div>
<div class="clr"></div>
</div>
</div>
</div>
<style type="text/css">
    .TxtStatus {
    display: none;
}
</style>
<script>
    jQuery('.wp-google-url').remove();
</script>
@endsection