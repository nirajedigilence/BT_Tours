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

                                    {{-- <div class="year disabled">

                                        <div class="pagination">
                                            <div class="name">2022</div>
                                        </div>

                                        <div class="months">
                                            <div class="month">Jan</div>
                                            <div class="month">Feb</div>
                                            <div class="month">Mar</div>
                                            <div class="month">Apr</div>
                                            <div class="month">May</div>
                                            <div class="month">Jun</div>
                                            <div class="month">Jul</div>
                                            <div class="month">Aug</div>
                                            <div class="month">Sep</div>
                                            <div class="month">Oct</div>
                                            <div class="month">Nov</div>
                                            <div class="month">Dec</div>
                                        </div>

                                    </div> --}}

                                </div>
                                
                            </div>

                        </div>

                        <div class="section_wrapper">

                            <div class="section">

                                <div class="section_heading">
                                    VIP Experience
                                </div>

                                <div class="intro">
                                    <p>
                                        Select your VIP experience from categories below, this is the main event of your tour
                                    </p>    
                                </div>

                                <div class="experience_types">

                                    <a href="#" class="cta active">
                                        Manors and Gardens
                                        <span>4 AVAILABLE</span>
                                    </a>

                                    <a href="#" class="cta">
                                        Artisans and Experts
                                        <span>4 AVAILABLE</span>
                                    </a>

                                    <a href="#" class="cta">
                                        Sports and Entertainment
                                        <span>4 AVAILABLE</span>
                                    </a>

                                    <div class="cta">
                                        Journeys
                                        <span>4 AVAILABLE</span>
                                    </div>

                                    <a href="#" class="cta">
                                        Iconic
                                        <span>4 AVAILABLE</span>
                                    </a>

                                    <div class="cta">
                                        Motoring and Aviation
                                        <span>4 AVAILABLE</span>
                                    </div>

                                </div>

                                <div class="experiences">

                                    <div class="type">
                                        Manors and Gardens
                                    </div>

                                    <div class="options_list">

                                        <a href="#" class="option">

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

                                        <a href="#" class="option">

                                            <div class="image"></div>

                                            <div class="content">

                                                <div class="text">

                                                    <div class="name">
                                                        Newby Hall
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

                                        <a href="#" class="option">

                                            <div class="image"></div>

                                            <div class="content">

                                                <div class="text">

                                                    <div class="name">
                                                        Scone palace
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

                                        <a href="#" class="cta clear">
                                            Clear Selection
                                        </a>

                                        <a href="#" class="cta">
                                            Select
                                        </a>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="section_wrapper">

                            <div class="section">

                                <div class="section_heading">
                                    Big Banner Experience
                                </div>

                                <div class="intro">
                                    <p>
                                        Select your Big Banner experience from categories below, this is the main event of your tour
                                    </p>    
                                </div>

                                <div class="experience_types">

                                    <a href="#" class="cta">
                                        Manors and Gardens
                                        <span>4 AVAILABLE</span>
                                    </a>

                                    <a href="#" class="cta active">
                                        Artisans and Experts
                                        <span>4 AVAILABLE</span>
                                    </a>

                                    <a href="#" class="cta">
                                        Sports and Entertainment
                                        <span>4 AVAILABLE</span>
                                    </a>

                                    <div class="cta">
                                        Journeys
                                        <span>4 AVAILABLE</span>
                                    </div>

                                    <a href="#" class="cta">
                                        Iconic
                                        <span>4 AVAILABLE</span>
                                    </a>

                                    <div class="cta">
                                        Motoring and Aviation
                                        <span>4 AVAILABLE</span>
                                    </div>

                                </div>

                                <div class="experiences">

                                    <div class="type">
                                        Artisans and Experts
                                    </div>

                                    <div class="options_list">

                                        <a href="#" class="option">

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

                                        <a href="#" class="option">

                                            <div class="image"></div>

                                            <div class="content">

                                                <div class="text">

                                                    <div class="name">
                                                        Dawyck Botanical Garden
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

                                        <a href="#" class="option">

                                            <div class="image"></div>

                                            <div class="content">

                                                <div class="text">

                                                    <div class="name">
                                                        1881 Distillery & Gin School
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

                                        <a href="#" class="cta clear">
                                            Clear Selection
                                        </a>

                                        <a href="#" class="cta">
                                            Select
                                        </a>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="section_wrapper">

                            <div class="section">

                                <div class="section_heading">
                                    Local Experiences
                                </div>

                                <div class="intro">
                                    <p>
                                        Select your extra local experiences here
                                    </p>    
                                </div>

                                <div class="experience_types">

                                    <a href="#" class="cta">
                                        Manors and Gardens
                                        <span>4 AVAILABLE</span>
                                    </a>

                                    <a href="#" class="cta active">
                                        Artisans and Experts
                                        <span>4 AVAILABLE</span>
                                    </a>

                                    <a href="#" class="cta">
                                        Sports and Entertainment
                                        <span>4 AVAILABLE</span>
                                    </a>

                                    <div class="cta">
                                        Journeys
                                        <span>4 AVAILABLE</span>
                                    </div>

                                    <a href="#" class="cta">
                                        Iconic
                                        <span>4 AVAILABLE</span>
                                    </a>

                                    <div class="cta">
                                        Motoring and Aviation
                                        <span>4 AVAILABLE</span>
                                    </div>

                                </div>

                                <div class="experiences">

                                    <div class="type">
                                        Artisans and Experts
                                    </div>

                                    <div class="options_list">

                                        <a href="#" class="option">

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

                                        <a href="#" class="option">

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

                                        <a href="#" class="option">

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

                                        <a href="#" class="cta clear">
                                            Clear Selection
                                        </a>

                                        <a href="#" class="cta">
                                            Select
                                        </a>

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
                                        What hotel type is of interests to you?
                                    </p>    
                                </div>

                                <div class="hotel_types">

                                    <a href="#" class="hotel_type">

                                        <div class="type">
                                            Value Hotels
                                        </div>

                                        <div class="stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>

                                        <div class="availability">
                                            11
                                            <span>Hotels available</span>
                                        </div>

                                        <p>
                                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore.
                                        </p>

                                    </a>

                                    <a href="#" class="hotel_type">

                                        <div class="type">
                                            Premium Hotels
                                        </div>

                                        <div class="stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>

                                        <div class="availability">
                                            3
                                            <span>Hotels available</span>
                                        </div>

                                        <p>
                                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore.
                                        </p>

                                    </a>

                                    <a href="#" class="hotel_type">

                                        <div class="type">
                                            Luxurious Hotels
                                        </div>

                                        <div class="stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-plus"></i>
                                        </div>

                                        <div class="availability">
                                            1
                                            <span>Hotels available</span>
                                        </div>

                                        <p>
                                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore.
                                        </p>

                                    </a>

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

                                <div class="additional_info">

                                    <div class="section_sub_heading">
                                        Additional information
                                    </div>

                                    <div class="form">

                                        <div class="field">
                                            <label>What's your group reference name?</label>
                                            <input type="text" />
                                        </div>

                                        <div class="checkboxes">

                                            <div class="checkbox_field">

                                                <input type="radio" name="price_range" id="any_price_range" checked>

                                                <label for="any_price_range">
                                                    <div class="checkbox"></div>
                                                    <p>I'm happy with any price range</p>
                                                </label>

                                            </div>

                                            <div class="checkbox_field">

                                                <input type="radio" name="price_range" id="lower_price_range">

                                                <label for="lower_price_range">
                                                    <div class="checkbox"></div>
                                                    <p>I'm happy with the lower price range only</p>
                                                </label>

                                            </div>

                                        </div>

                                        <div class="field">
                                            <label>Comments</label>
                                            <textarea rows="3"></textarea>
                                        </div>

                                        <button type="submit">
                                            Submit form
                                        </button>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="section_wrapper">

                            <div class="section">

                                <div class="section_heading">
                                    Additional Location
                                </div>

                                <div class="additional_location">

                                    <p>
                                        Would you like to combine your tour with another location?
                                    </p>

                                    <div class="ctas">

                                        <a href="#" class="cta">
                                            No
                                        </a>

                                        <a href="#" class="cta">
                                            Yes
                                        </a>

                                    </div>

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

                                <li class="disabled">
                                    <div class="label">VIP Experience</div>
                                    <div class="option_selected">&nbsp;</div>
                                </li>

                                <li class="disabled">
                                    <div class="label">Big Banner Experience</div>
                                    <div class="option_selected">&nbsp;</div>
                                </li>

                                <li class="disabled">
                                    <div class="label">Local Experience</div>
                                    <div class="option_selected">&nbsp;</div>
                                </li>

                                <li class="disabled">
                                    <div class="label">Hotel</div>
                                    <div class="option_selected">&nbsp;</div>
                                </li>

                                <li class="disabled">
                                    <div class="label">Overview</div>
                                    <div class="option_selected">&nbsp;</div>
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