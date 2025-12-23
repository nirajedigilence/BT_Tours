@extends('layouts.front')

@section('content')

<div class="notIndexContainer">

    <div class="accountContainer">
        <div class="mobMenuBtn only-mobile" id="topMenu">
            <input id="menu__toggle2" type="checkbox" />
            <label class="menu__btn" for="menu__toggle2">
                <span></span>
                <div class="message">MENU</div>
            </label>
        </div>

        <div class="accountRow">

            <div class="leftCol">
                @include('partials.super_user_left',['open_menu' => 'stocklist', 'sub_marked' => 'stocklist-ship']);
            </div>

            <div id="cartExperiencesPart" class="account_main_content">
                @include ('partials.ship_stocklist.ship_list', [
                    'countries' => $countries,
                ])
            </div>

            <!-- <div class="account_main_content">

                <div class="left_column">

                    <div class="main_content_nav">

                        <div class="filters">

                            <div class="filters_dropdown">

                                <div class="cta">
                                    Filters
                                </div>

                                <div class="dropdown">

                                    <div class="heading">
                                        Filter By
                                    </div>

                                    <div class="options months">

                                        <div class="option">

                                            <div class="column checkbox">
                                                <input type="checkbox" id="checkbox_1" checked>
                                                <label for="checkbox_1"></label>
                                            </div>

                                            <div class="label">
                                                Jan
                                            </div>

                                        </div>

                                        <div class="option">

                                            <div class="column checkbox">
                                                <input type="checkbox" id="checkbox_2" checked>
                                                <label for="checkbox_2"></label>
                                            </div>

                                            <div class="label">
                                                Feb
                                            </div>

                                        </div>

                                        <div class="option">

                                            <div class="column checkbox">
                                                <input type="checkbox" id="checkbox_3" checked>
                                                <label for="checkbox_3"></label>
                                            </div>

                                            <div class="label">
                                                Mar
                                            </div>

                                        </div>

                                        <div class="option">

                                            <div class="column checkbox">
                                                <input type="checkbox" id="checkbox_4" checked>
                                                <label for="checkbox_4"></label>
                                            </div>

                                            <div class="label">
                                                Apr
                                            </div>

                                        </div>

                                        <div class="option">

                                            <div class="column checkbox">
                                                <input type="checkbox" id="checkbox_5" checked>
                                                <label for="checkbox_5"></label>
                                            </div>

                                            <div class="label">
                                                May
                                            </div>

                                        </div>

                                        <div class="option">

                                            <div class="column checkbox">
                                                <input type="checkbox" id="checkbox_6" checked>
                                                <label for="checkbox_6"></label>
                                            </div>

                                            <div class="label">
                                                Jun
                                            </div>

                                        </div>

                                        <div class="line_break"></div>

                                        <div class="option">

                                            <div class="column checkbox">
                                                <input type="checkbox" id="checkbox_7" checked>
                                                <label for="checkbox_7"></label>
                                            </div>

                                            <div class="label">
                                                Jul
                                            </div>

                                        </div>

                                        <div class="option">

                                            <div class="column checkbox">
                                                <input type="checkbox" id="checkbox_8" checked>
                                                <label for="checkbox_8"></label>
                                            </div>

                                            <div class="label">
                                                Aug
                                            </div>

                                        </div>

                                        <div class="option">

                                            <div class="column checkbox">
                                                <input type="checkbox" id="checkbox_9" checked>
                                                <label for="checkbox_9"></label>
                                            </div>

                                            <div class="label">
                                                Sep
                                            </div>

                                        </div>

                                        <div class="option">

                                            <div class="column checkbox">
                                                <input type="checkbox" id="checkbox_10" checked>
                                                <label for="checkbox_10"></label>
                                            </div>

                                            <div class="label">
                                                Oct
                                            </div>

                                        </div>

                                        <div class="option">

                                            <div class="column checkbox">
                                                <input type="checkbox" id="checkbox_11" checked>
                                                <label for="checkbox_11"></label>
                                            </div>

                                            <div class="label">
                                                Nov
                                            </div>

                                        </div>

                                        <div class="option">

                                            <div class="column checkbox">
                                                <input type="checkbox" id="checkbox_12" checked>
                                                <label for="checkbox_12"></label>
                                            </div>

                                            <div class="label">
                                                Dec
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <ul class="active_filters">
                                <li class="label">Active filters:</li>
                                <li>Location <span>x</span></li>
                                <li>Town/City <span>x</span></li>
                            </ul>

                        </div>

                        <div class="search">

                            <div class="search__input">
                                <input type="text" placeholder="Search">
                                <button type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>

                            <a href="#" class="search__expand">

                                <div class="cta">
                                    Expand search
                                </div>

                                <div class="dropdown">

                                    <div class="heading">
                                        Hotel Search
                                    </div>

                                    <div class="form">

                                        <div class="fieldset">
                                            <label>Hotel Name</label>
                                            <input type="text">
                                        </div>

                                        <div class="fieldset">
                                            <label>Location</label>
                                            <input type="text">
                                        </div>

                                        <div class="fieldset">
                                            <label>Town / City</label>
                                            <input type="text">
                                        </div>

                                        <button type="submit">
                                            Search
                                        </button>

                                    </div>

                                </div>

                            </a>

                        </div>

                    </div>

                    <div class="left_column__list">

                        <div class="left_column__list_row header">

                            <div class="left_column__list_column w_30">
                                Hotel
                            </div>

                            <div class="left_column__list_column w_12-5">
                                Location
                            </div>

                            <div class="left_column__list_column w_12-5">
                                Town/City
                            </div>

                            <div class="left_column__list_column w_20">
                                Months
                            </div>

                            <div class="left_column__list_column w_12-5 centered">
                                Events
                            </div>

                            <div class="left_column__list_column w_12-5 centered">
                                Dates Booked
                            </div>

                        </div>

                        <div class="left_column__list_row active">

                            <div class="left_column__list_column w_30 bold">
                                The Nottinghal Sherwood Hotel
                            </div>

                            <div class="left_column__list_column w_12-5">
                                England - 
                                <span class="line_break">North East</span>
                            </div>

                            <div class="left_column__list_column w_12-5">
                                Nottingham
                            </div>

                            <div class="left_column__list_column w_20">
                                Apr <strong class="green">May</strong> Jun Aug Sept Oct
                            </div>

                            <div class="left_column__list_column w_12-5 centered">
                                <strong class="green">Yes</strong>
                            </div>

                            <div class="left_column__list_column w_12-5 centered">
                                4/8
                            </div>

                        </div>

                        <div class="left_column__list_row">

                            <div class="left_column__list_column w_30 bold">
                                AC Hotel Manchester City Centre
                            </div>

                            <div class="left_column__list_column w_12-5">
                                England - 
                                <span class="line_break">North East</span>
                            </div>

                            <div class="left_column__list_column w_12-5">
                                Grantham
                            </div>

                            <div class="left_column__list_column w_20">
                                Jun Aug Sept Oct
                            </div>

                            <div class="left_column__list_column w_12-5 centered">
                                No
                            </div>

                            <div class="left_column__list_column w_12-5 centered">
                                1/4
                            </div>

                        </div>

                        <div class="left_column__list_row">

                            <div class="left_column__list_column w_30 bold">
                                Aldwark Manor Golf & Spa Hotel
                            </div>

                            <div class="left_column__list_column w_12-5">
                                England - 
                                <span class="line_break">North East</span>
                            </div>

                            <div class="left_column__list_column w_12-5">
                                Grantham
                            </div>

                            <div class="left_column__list_column w_20">
                                Jun Aug Sept Oct
                            </div>

                            <div class="left_column__list_column w_12-5 centered">
                                No
                            </div>

                            <div class="left_column__list_column w_12-5 centered">
                                1/4
                            </div>

                        </div>

                        <div class="left_column__list_row">

                            <div class="left_column__list_column w_30 bold">
                                Alexandra Hotel
                            </div>

                            <div class="left_column__list_column w_12-5">
                                England - 
                                <span class="line_break">North East</span>
                            </div>

                            <div class="left_column__list_column w_12-5">
                                Grantham
                            </div>

                            <div class="left_column__list_column w_20">
                                Jun Aug Sept Oct
                            </div>

                            <div class="left_column__list_column w_12-5 centered">
                                No
                            </div>

                            <div class="left_column__list_column w_12-5 centered">
                                1/4
                            </div>

                        </div>

                        <div class="left_column__list_row">

                            <div class="left_column__list_column w_30 bold">
                                Almarose Hotels
                            </div>

                            <div class="left_column__list_column w_12-5">
                                England - 
                                <span class="line_break">North East</span>
                            </div>

                            <div class="left_column__list_column w_12-5">
                                Grantham
                            </div>

                            <div class="left_column__list_column w_20">
                                Jun Aug Sept Oct
                            </div>

                            <div class="left_column__list_column w_12-5 centered">
                                No
                            </div>

                            <div class="left_column__list_column w_12-5 centered">
                                1/4
                            </div>

                        </div>

                        <div class="left_column__list_row">

                            <div class="left_column__list_column w_30 bold">
                                Barony Castle Hotel
                            </div>

                            <div class="left_column__list_column w_12-5">
                                England - 
                                <span class="line_break">North East</span>
                            </div>

                            <div class="left_column__list_column w_12-5">
                                Grantham
                            </div>

                            <div class="left_column__list_column w_20">
                                Jun Aug Sept Oct
                            </div>

                            <div class="left_column__list_column w_12-5 centered">
                                No
                            </div>

                            <div class="left_column__list_column w_12-5 centered">
                                1/4
                            </div>

                        </div>

                        <div class="left_column__list_row">

                            <div class="left_column__list_column w_30 bold">
                                AC Hotel Manchester City Centre
                            </div>

                            <div class="left_column__list_column w_12-5">
                                England - 
                                <span class="line_break">North East</span>
                            </div>

                            <div class="left_column__list_column w_12-5">
                                Grantham
                            </div>

                            <div class="left_column__list_column w_20">
                                Jun Aug Sept Oct
                            </div>

                            <div class="left_column__list_column w_12-5 centered">
                                No
                            </div>

                            <div class="left_column__list_column w_12-5 centered">
                                1/4
                            </div>

                        </div>

                    </div>

                </div>

                <div class="right_column">

                    <div class="intro">

                        <div class="heading">
                            THE NOTTINGHAM SHERWOOD HOTEL
                        </div>

                        <div class="contact_info">

                            <div class="name">
                                Rebecca Kitching (Manager)
                            </div>

                            <div class="block">

                                <div class="sub_heading">
                                    Contact number
                                </div>

                                <div>
                                    direct: <span class="orange">07393726131</span>
                                </div>

                                <div>
                                    main: <span class="orange">07393726131</span>
                                </div>

                            </div>

                            <div class="block">

                                <div class="sub_heading">
                                    Email
                                </div>

                                <div>
                                    <a href="mailto:contact@sherwoodhotel.com" class="email">
                                        contact@sherwoodhotel.com
                                    </a>
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="dates">

                        <div class="date">
                            Mon 03 May - Fri 07 May '21 (4 nights)
                        </div>

                        <div class="date active">
                            Mon 03 May - Fri 07 May '21 (4 nights)
                        </div>

                        <div class="date active">
                            Mon 03 May - Fri 07 May '21 (4 nights)
                        </div>

                        <div class="date active">
                            Mon 03 May - Fri 07 May '21 (4 nights)
                        </div>

                        <div class="date">
                            Mon 03 May - Fri 07 May '21 (4 nights)
                        </div>

                        <div class="date">
                            Mon 03 May - Fri 07 May '21 (4 nights)
                        </div>

                        <div class="date">
                            Mon 03 May - Fri 07 May '21 (4 nights)
                        </div>

                        <div class="date active">
                            Mon 03 May - Fri 07 May '21 (4 nights)
                        </div>

                        <div class="date">
                            Mon 03 May - Fri 07 May '21 (4 nights)
                        </div>

                        <div class="date">
                            Mon 03 May - Fri 07 May '21 (4 nights)
                        </div>

                        <div class="date">
                            Mon 03 May - Fri 07 May '21 (4 nights)
                        </div>

                        <div class="date">
                            Mon 03 May - Fri 07 May '21 (4 nights)
                        </div>

                        <div class="date">
                            Mon 03 May - Fri 07 May '21 (4 nights)
                        </div>

                        <div class="date">
                            Mon 03 May - Fri 07 May '21 (4 nights)
                        </div>

                    </div>

                    <div class="footer_links">

                        <a href="#" class="cta">
                            View and Add Dates
                        </a>

                        <a href="#" class="cta">
                            Calendar View
                        </a>

                        <a href="#" class="cta">
                            Sold dates
                        </a>

                        <a href="#" class="cta">
                            Cancel Dates
                        </a>

                        <a href="#" class="cta">
                            Contracts
                        </a>

                    </div>

                </div>

            </div> -->

        </div>

    </div>

</div>
    <!-- Modal -->
<div class="modal fade" id="resignNoteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add a new note</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method="POST" enctype="multipart/form-data" id="ajax-file-upload1" class="super_add">
           
            @csrf
            <!-- <input type="text" maxlength="10" name="initials" id="initials" placeholder="Initials">
            <p class="initials_cls" style="color: red;"></p>
            <br> -->
           
            <input type="hidden" name="cart_id" id="cart_id" value="">
            <input type="hidden" name="user_type" id="user_type" value="1">
            <p>Please state the reason for this amendment</p>
            <textarea type="text" class="form-control" name="notes" id="notes" placeholder="Type here" rows="7"></textarea>
            <!-- <input type="text" class="form-control" name="notes" id="notes" placeholder="Type here" rows="7"> -->
            <p class="notes_cls" style="color: red;"></p>                                           
           
            <!-- <button type="submit" class="mt-2 btn btn-primary" id="add_notes" style="max-width: 500px;">
                Add Note
            </button> -->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"  id="add_notes" >Add Note</button>
      </div>
    </div>
  </div>
</div>
<script>
    /*$(document).on('change', '.notClickedCls', function(e) {
       
        $('#changed_dates').val('1');
    });*/
   
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
