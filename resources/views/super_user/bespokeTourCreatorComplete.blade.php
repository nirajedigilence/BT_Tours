@extends('layouts.front')

@section('content')

<div class="notIndexContainer">

    <div class="accountContainer">
        <div class="accountRow">

            <div class="leftCol">
                @include('partials.super_user_left', ['open_menu' => 'database', 'sub_marked' => 'hotels'])
            </div>

            <div id="bespoke_tour_creator">

                <div class="main">

                    <div class="left">

                        <div class="section_wrapper">

                            <div class="section">

                                <div class="location_heading">
                                    Location 1 of 1
                                </div>

                            </div>

                        </div>

                        <div class="section_wrapper split">

                            <div class="section">

                                <div class="section_heading small">
                                    Location
                                </div>

                                <div class="location_form">

                                    <div class="fieldset">
                                        <label>Select a country</label>
                                        <select>
                                            <option value="" selected>England</option>
                                        </select>
                                    </div>

                                    <div class="fieldset">
                                        <label>Select a county</label>
                                        <select>
                                            <option value="" selected>Somerset</option>
                                        </select>
                                    </div>

                                    <button type="submit">
                                        Search
                                    </button>

                                </div>

                            </div>

                            <div class="section">

                                <div class="section_heading small">
                                    Tour date
                                </div>

                                <div class="tour_date">

                                    <div class="year">

                                        <div class="pagination">
                                            <a href="#" class="arrow prev"></a>
                                            <div class="name">2021</div>
                                            <a href="#" class="arrow next"></a>
                                        </div>

                                        <div class="months">
                                            <a href="#" class="month">Jan</a>
                                            <a href="#" class="month">Feb</a>
                                            <a href="#" class="month">Mar</a>
                                            <a href="#" class="month">Apr</a>
                                            <a href="#" class="month">May</a>
                                            <a href="#" class="month active">Jun</a>
                                            <a href="#" class="month active">Jul</a>
                                            <a href="#" class="month active">Aug</a>
                                            <a href="#" class="month">Sep</a>
                                            <a href="#" class="month">Oct</a>
                                            <a href="#" class="month">Nov</a>
                                            <a href="#" class="month">Dec</a>
                                        </div>

                                    </div>

                                </div>
                                
                            </div>

                        </div>

                        <div class="section_wrapper">

                            <div class="section">

                                <div class="section_heading">
                                    VIP Experience
                                </div>

                                <div class="experiences">

                                    <div class="type">
                                        Manors and Gardens
                                    </div>

                                    <div class="options_list">

                                        <a href="#" class="option selected">

                                            <div class="image"></div>

                                            <div class="content">

                                                <div class="text">

                                                    <div class="name">
                                                        Leighton hall
                                                    </div>

                                                    <div class="map_cta">
                                                        see on map
                                                    </div>

                                                    <p>
                                                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod.
                                                    </p>

                                                </div>

                                                <div class="banner">

                                                    <div class="duration">
                                                        Full day experience
                                                    </div>

                                                    <div class="price">
                                                        <span>From</span> &pound;40pp
                                                    </div>

                                                </div>

                                            </div>

                                        </a>

                                    </div>

                                    <div class="section_footer">

                                        <div class="down_arrow"></div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="section_wrapper">

                            <div class="section">

                                <div class="section_heading">
                                    Big Banner Experience
                                </div>

                                <div class="experiences">

                                    <div class="type">
                                        Artisans and Experts
                                    </div>

                                    <div class="options_list">

                                        <a href="#" class="option selected">

                                            <div class="image"></div>

                                            <div class="content">

                                                <div class="text">

                                                    <div class="name">
                                                        The Royal Yacht Britannia
                                                    </div>

                                                    <div class="map_cta">
                                                        see on map
                                                    </div>

                                                    <p>
                                                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod.
                                                    </p>

                                                </div>

                                                <div class="banner">

                                                    <div class="duration">
                                                        Full day experience
                                                    </div>

                                                    <div class="price">
                                                        <span>From</span> &pound;40pp
                                                    </div>

                                                </div>

                                            </div>

                                        </a>

                                    </div>

                                    <div class="section_footer">

                                        <div class="down_arrow"></div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="section_wrapper">

                            <div class="section">

                                <div class="section_heading">
                                    Local Experiences
                                </div>

                                <div class="experiences">

                                    <div class="type">
                                        Artisans and Experts
                                    </div>

                                    <div class="options_list">

                                        <a href="#" class="option selected">

                                            <div class="image"></div>

                                            <div class="content">

                                                <div class="text">

                                                    <div class="name">
                                                        Food Market in York
                                                    </div>

                                                    <div class="map_cta">
                                                        see on map
                                                    </div>

                                                    <p>
                                                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod.
                                                    </p>

                                                </div>

                                                <div class="banner">

                                                    <div class="duration">
                                                        Full day experience
                                                    </div>

                                                    <div class="price">
                                                        <span>From</span> &pound;40pp
                                                    </div>

                                                </div>

                                            </div>

                                        </a>

                                        <a href="#" class="option selected">

                                            <div class="image"></div>

                                            <div class="content">

                                                <div class="text">

                                                    <div class="name">
                                                        Scottish Food Experience
                                                    </div>

                                                    <div class="map_cta">
                                                        see on map
                                                    </div>

                                                    <p>
                                                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod.
                                                    </p>

                                                </div>

                                                <div class="banner">

                                                    <div class="duration">
                                                        Full day experience
                                                    </div>

                                                    <div class="price">
                                                        <span>From</span> &pound;40pp
                                                    </div>

                                                </div>

                                            </div>

                                        </a>

                                        <a href="#" class="option selected">

                                            <div class="image"></div>

                                            <div class="content">

                                                <div class="text">

                                                    <div class="name">
                                                        Swinging 60's
                                                    </div>

                                                    <div class="map_cta">
                                                        see on map
                                                    </div>

                                                    <p>
                                                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod.
                                                    </p>

                                                </div>

                                                <div class="banner">

                                                    <div class="duration">
                                                        Full day experience
                                                    </div>

                                                    <div class="price">
                                                        <span>From</span> &pound;40pp
                                                    </div>

                                                </div>

                                            </div>

                                        </a>

                                    </div>

                                    <div class="section_footer">

                                        <div class="down_arrow"></div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="section_wrapper">

                            <div class="section">

                                <div class="section_heading">
                                    Hotels
                                </div>

                                <div class="intro">
                                    <p>
                                        Select one or more hotels that interests you and how many nights you wish to spend there
                                    </p>    
                                </div>

                                <div class="options_list">

                                    <a href="#" class="option">

                                        <div class="image"></div>

                                        <div class="content">

                                            <div class="text">

                                                <div class="name">
                                                    The Tontine Hotel
                                                </div>

                                                <p>
                                                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod.
                                                </p>

                                            </div>

                                            <div class="banner">

                                                <div class="duration">
                                                    Full day experience
                                                </div>

                                                <div class="price">
                                                    <span>From</span> &pound;40pp
                                                </div>

                                            </div>

                                        </div>

                                    </a>

                                    <div class="option">

                                        <div class="image"></div>

                                        <div class="content">

                                            <div class="text">

                                                <div class="name">
                                                    The Tontine Hotel
                                                </div>

                                                <p>
                                                    How many nights do you wish to stay in this hotel?
                                                </p>

                                                <div class="night_count">
                                                    <a href="#" class="number">1</a>
                                                    <a href="#" class="number">2</a>
                                                    <a href="#" class="number">3</a>
                                                    <a href="#" class="number">4</a>
                                                    <a href="#" class="number">5</a>
                                                    <a href="#" class="number">6</a>
                                                    <a href="#" class="number">7</a>
                                                    <a href="#" class="number">8</a>
                                                    <a href="#" class="number">9</a>
                                                    <a href="#" class="number">10</a>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <a href="#" class="option selected">

                                        <div class="image"></div>

                                        <div class="content">

                                            <div class="text">

                                                <div class="name">
                                                    The Tontine Hotel
                                                </div>

                                                <p>
                                                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod.
                                                </p>

                                            </div>

                                            <div class="banner">

                                                <div class="price">
                                                    3 Nights <span>from</span> &pound;40pppn
                                                </div>

                                            </div>

                                        </div>

                                    </a>

                                </div>

                                <div class="section_footer">

                                    <div class="down_arrow"></div>

                                </div>

                            </div>

                        </div>

                        <div class="section_wrapper">

                            <div class="section">

                                <div class="section_heading">
                                    Map
                                </div>

                                <div class="intro">
                                    <p>
                                        Visualise all your choices on a map
                                    </p>
                                </div>

                                <div class="map_wrapper">
                                    <div class="map"></div>
                                </div>

                            </div>

                        </div>

                        <div class="section_wrapper">

                            <div class="section">

                                <div class="location_heading">
                                    Location 2 of 2
                                </div>

                                <div class="tour_overview">

                                    <div class="block">
                                        <div class="label">Location</div>
                                        <div class="option_selected">England, Somerset</div>
                                    </div>

                                    <div class="block">
                                        <div class="label">VIP Experience</div>
                                        <div class="option_selected">Leighton hall</div>
                                    </div>

                                    <div class="block">
                                        <div class="label">Big Banner Experience</div>
                                        <div class="option_selected">The Royal Yacht Britannia</div>
                                    </div>

                                    <div class="block">
                                        <div class="label">Local Experience</div>
                                        <div class="option_selected">
                                            Food Market in York,<br>
                                            Scottish Food Experience,<br>
                                            Swinging 60's
                                        </div>
                                    </div>

                                    <div class="block">
                                        <div class="label">Hotel</div>
                                        <div class="option_selected">
                                            The Tontine Hotel (3 nights)<br>
                                            Mercure Hotel (2 nights)
                                        </div>
                                    </div>

                                </div>

                                <div class="section_footer">

                                    <div class="down_arrow"></div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="right">

                        <div class="tour_components">

                            <div class="sub_heading">
                                Tour Components
                            </div>

                            <ul class="list">

                                <li>
                                    <div class="label">Location</div>
                                    <div class="option_selected">England, Somerset</div>
                                </li>

                                <li>
                                    <div class="label">Tour date</div>
                                    <div class="option_selected">2021 - June, July, August</div>
                                </li>

                                <li>
                                    <div class="label">VIP Experience</div>
                                    <div class="option_selected">Leighton hall</div>
                                </li>

                                <li>
                                    <div class="label">Big Banner Experience</div>
                                    <div class="option_selected">The Royal Yacht Britannia</div>
                                </li>

                                <li>
                                    <div class="label">Local Experience</div>
                                    <div class="option_selected">
                                        Food Market in York,<br>
                                        Scottish Food Experience,<br>
                                        Swinging 60's
                                    </div>
                                </li>

                                <li>
                                    <div class="label">Hotel</div>
                                    <div class="option_selected">
                                        The Tontine Hotel (3 nights)<br>
                                        Mercure Hotel (2 nights)
                                    </div>
                                </li>

                                <li class="active">
                                    <div class="label">Overview</div>
                                </li>

                            </ul>

                        </div>

                        <div class="tour_estimate">

                            <div class="sub_heading">
                                Tour estimate
                                <span>(BASED ON MIN 20 PEOPLE)</span>
                            </div>

                            <div class="price">
                                From
                                <span>&pound;0.00 pp</span>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script>
    var updated = 0;
    $(document).ready(function(){

        $(".hasAccSubmenu .menuLink").bind("click", function(e){
            e.preventDefault();
            if ($(this).parent().hasClass("open")) {
                $(this).parent().removeClass("open");
                $(this).parent().children(".submenuHolder").slideUp();
            }else {
                $(this).parent().addClass("open");
                $(this).parent().children(".submenuHolder").slideDown();
            }
        });

    });
</script>

@endsection