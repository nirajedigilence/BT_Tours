@extends('layouts.front')

@section('content')

<div class="notIndexContainer">

    <div class="accountContainer">
        <div class="accountRow">

            <div class="leftCol">
                @include('partials.super_user_left',['open_menu' => 'database', 'sub_marked' => 'experiences']);
            </div>

            <div class="account_main_content">

                <div class="left_column">
                    <div class="hotel_header">

                        <div class="logo__hotel_details">

                            <div class="logo">
                                Logo
                            </div>

                            <div class="hotel_details">

                                <div class="name">
                                    {{$experience->name}}
                                </div>
                                <div class="location">
                                    <div>
                                    <?php 
                                    $country = '';
                                    if(!empty($experience->countryarea->countries_id)){
                                        $country = 


DB::connection('mysql_veenus')->table('countries')->where("id", $experience->countryarea->countries_id)->first();
                                    }
                                    ?>
                                    <?php echo (isset($country->name) ? $country->name.' - ' : ''); ?><?php echo (isset($experience->countryarea->name) ? $experience->countryarea->name : '-'); ?></div>
                                </div>

                            </div>

                        </div>

                        <div class="ctas">

                            <a href="#" class="alerts_cta" style="background: #ddd;pointer-events: none;">
                                <div class="icon"></div>
                                <div class="label">(1) Alerts</div>
                            </a>

                            <a href="javascript:;" class="settings_cta" id="editExperiance" data-id="{{$experience->id}}"></a>

                        </div>

                    </div>

                    <div class="hotel">

                        <div class="column">

                            <div class="section with_padding">

                                <div class="main_heading">
                                    Contacts
                                    <a href="#" class="cta">view & edit</a>
                                </div>

                                <div id="contacts">

                                    <div class="column">

                                        <div class="heading">
                                            On-site
                                        </div>

                                        <div class="list">

                                            <div class="list__item">

                                                <div class="sub_heading">
                                                    Name
                                                </div>

                                                <div>
                                                    Mike Tomson
                                                </div>

                                            </div>

                                            <div class="list__item">

                                                <div class="sub_heading">
                                                    Position
                                                </div>

                                                <div>
                                                    General Manager
                                                </div>

                                            </div>

                                            <div class="list__item">

                                                <div class="sub_heading">
                                                    Contact nr
                                                </div>

                                                <div>
                                                    <span class="orange">073681722112</span>
                                                </div>

                                            </div>

                                            <div class="list__item">

                                                <div class="sub_heading">
                                                    Email
                                                </div>

                                                <div>
                                                    <a href="mailto:mike.j@gmail.com" class="link">
                                                        mike.j@gmail.com
                                                    </a>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="column">

                                        <div class="heading">
                                            Reception
                                        </div>

                                        <div class="list">

                                            <div class="list__item">

                                                <div class="sub_heading">
                                                    Name
                                                </div>

                                                <div>
                                                    Mike Tomson
                                                </div>

                                            </div>

                                            <div class="list__item">

                                                <div class="sub_heading">
                                                    Position
                                                </div>

                                                <div>
                                                    General Manager
                                                </div>

                                            </div>

                                            <div class="list__item">

                                                <div class="sub_heading">
                                                    Contact nr
                                                </div>

                                                <div>
                                                    <span class="orange">073681722112</span>
                                                </div>

                                            </div>

                                            <div class="list__item">

                                                <div class="sub_heading">
                                                    Email
                                                </div>

                                                <div>
                                                    <a href="mailto:mike.j@gmail.com" class="link">
                                                        mike.j@gmail.com
                                                    </a>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="column">

                                        <div class="heading">
                                            CEO
                                        </div>

                                        <div class="list">

                                            <div class="list__item">

                                                <div class="sub_heading">
                                                    Name
                                                </div>

                                                <div>
                                                    Mike Tomson
                                                </div>

                                            </div>

                                            <div class="list__item">

                                                <div class="sub_heading">
                                                    Position
                                                </div>

                                                <div>
                                                    General Manager
                                                </div>

                                            </div>

                                            <div class="list__item">

                                                <div class="sub_heading">
                                                    Contact nr
                                                </div>

                                                <div>
                                                    <span class="orange">073681722112</span>
                                                </div>

                                            </div>

                                            <div class="list__item">

                                                <div class="sub_heading">
                                                    Email
                                                </div>

                                                <div>
                                                    <a href="mailto:mike.j@gmail.com" class="link">
                                                        mike.j@gmail.com
                                                    </a>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="section with_padding">

                                <div class="main_heading">
                                    General Information
                                </div>

                                <div class="intro">

                                    <div class="sub_heading">
                                        About
                                    </div>

                                    <p>
                                        <?php echo $experience->description; ?>
                                    </p>

                                </div>

                                <div id="general_info">

                                    <div class="column">

                                        <div class="list">

                                            <div class="list__item">

                                                <div class="sub_heading">
                                                    Address
                                                </div>

                                                <div>
                                                    <?php echo $experience->address; ?>
                                                </div>

                                            </div>

                                            <div class="list__item">

                                                <div class="sub_heading">
                                                    General email
                                                </div>

                                                <div>
                                                    <?php echo (isset($experience->email) ? $experience->email : ''); ?>
                                                </div>

                                            </div>

                                            <div class="list__item">

                                                <div class="sub_heading">
                                                    Mobility access
                                                </div>

                                                <div>
                                                    <?php echo (isset($experience->mobility) ? $experience->mobility : ''); ?>
                                                </div>

                                            </div>

                                            <div class="list__item">

                                                <div class="sub_heading">
                                                    Website
                                                </div>

                                                <div>
                                                    <?php echo (isset($experience->website) ? $experience->website : ''); ?>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="column">

                                        <div class="list">

                                            <div class="list__item">

                                                <div class="sub_heading">
                                                    Main phone number
                                                </div>

                                                <div>
                                                    <?php echo (isset($experience->main_contact_number) ? $experience->main_contact_number : ''); ?>
                                                </div>

                                            </div>

                                            <div class="list__item">

                                                <div class="sub_heading">
                                                    Owner or association
                                                </div>

                                                <div>
                                                    <?php echo (isset($experience->owner) ? $experience->owner : ''); ?>
                                                </div>

                                            </div>

                                            <div class="list__item">

                                                <div class="sub_heading">
                                                    Experience length
                                                </div>

                                                <div>
                                                    <?php
                                                    if(isset($experience->half_full)){
                                                        if($experience->half_full == 1){
                                                            echo 'Half day experience';
                                                        }else if($experience->half_full == 2){
                                                            echo 'Full day experience';
                                                        }
                                                    }
                                                    ?>
                                                </div>

                                            </div>

                                            <div class="list__item">

                                                <div class="sub_heading">
                                                    Gallery or virtual tour
                                                </div>

                                                <div>
                                                    silverstone.co.uk
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="section with_padding">

                                <div class="main_heading">
                                    Bookings
                                </div>

                                <div id="bookings">

                                    <div class="column">

                                        <div class="heading">
                                            Last 3 bookings
                                        </div>

                                        <div class="bookings">

                                            <div class="booking">
                                                <div>Regal scotland</div>
                                                <div>Sat 23 Jul - Fri 30 Jun '21</div>
                                            </div>

                                            <div class="booking">
                                                <div>Regal scotland</div>
                                                <div>Sat 23 Jul - Fri 30 Jun '21</div>
                                            </div>

                                            <div class="booking">
                                                <div>Regal scotland</div>
                                                <div>Sat 23 Jul - Fri 30 Jun '21</div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="column">

                                        <div class="heading">
                                            Next 3 bookings
                                        </div>

                                        <div class="bookings">

                                            <div class="booking">
                                                <div>Regal scotland</div>
                                                <div>Sat 23 Jul - Fri 30 Jun '21</div>
                                            </div>

                                            <div class="booking">
                                                <div>Regal scotland</div>
                                                <div>Sat 23 Jul - Fri 30 Jun '21</div>
                                            </div>

                                            <div class="booking">
                                                <div>Regal scotland</div>
                                                <div>Sat 23 Jul - Fri 30 Jun '21</div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="section_split">

                                <div class="section with_padding">

                                    <div class="main_heading">
                                        EPS
                                    </div>

                                    <div class="section_table">

                                        <div class="section_row header">

                                            <div class="label">
                                                Category
                                            </div>

                                            <div>
                                                Score
                                            </div>

                                        </div>

                                        <div class="section_row">

                                            <div class="label">
                                                RR / Option rooms
                                            </div>

                                            <div>
                                                3
                                            </div>

                                        </div>

                                        <div class="section_row">

                                            <div class="label">
                                                RR / Option rooms
                                            </div>

                                            <div>
                                                3
                                            </div>

                                        </div>

                                        <div class="section_row">

                                            <div class="label">
                                                RR / Option rooms
                                            </div>

                                            <div>
                                                3
                                            </div>

                                        </div>

                                        <div class="section_row">

                                            <div class="label">
                                                RR / Option rooms
                                            </div>

                                            <div>
                                                3
                                            </div>

                                        </div>

                                        <div class="section_row">

                                            <div class="label">
                                                RR / Option rooms
                                            </div>

                                            <div>
                                                3
                                            </div>

                                        </div>

                                        <div class="section_footer">

                                            <div>
                                                Total: <span class="orange">14</span>
                                            </div>

                                            <div class="percentage">
                                                86%
                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="section with_padding">

                                    <div class="main_heading">
                                        Analytics
                                    </div>

                                    <div class="section_table">

                                        <div class="section_row header">

                                            <div class="label">
                                                Statistics name
                                            </div>

                                            <div>
                                                Score
                                            </div>

                                        </div>

                                        <div class="section_row">

                                            <div class="label">
                                                RR / Option rooms
                                            </div>

                                            <div>
                                                3
                                            </div>

                                        </div>

                                        <div class="section_row">

                                            <div class="label">
                                                RR / Option rooms
                                            </div>

                                            <div>
                                                3
                                            </div>

                                        </div>

                                        <div class="section_row">

                                            <div class="label">
                                                RR / Option rooms
                                            </div>

                                            <div>
                                                3
                                            </div>

                                        </div>

                                        <div class="section_row">

                                            <div class="label">
                                                RR / Option rooms
                                            </div>

                                            <div>
                                                3
                                            </div>

                                        </div>

                                        <div class="section_row">

                                            <div class="label">
                                                RR / Option rooms
                                            </div>

                                            <div>
                                                3
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="column">

                            <div class="section">
                                <?php
                                if(isset($experience_image[0]) && $experience_image[0]){
                                ?>
                                    <img src="{{ asset('/storage/'.$experience_image[0]['file']) }}" />
                                <?php }else{ ?>
                                    <img src="{{ asset('images/database/hotels/placeholder-image.jpg') }}" style="height: 360px;width: 100%;"/>
                                <?php } ?>
                            </div>

                            <div class="section with_padding">

                                <div id="map">

                                    <iframe src="<?php echo (isset($experience->location_url) ? $experience->location_url : ''); ?>" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

                                </div>

                            </div>

                            <div class="section with_padding">

                                <div class="main_heading">
                                    Notes   <a href="javascript:;" class="cta" id="editNotes" data-id="{{$experience->id}}">edit</a>
                                </div>

                                <div id="notes">

                                    <div class="note_list">
                                        <?php if(!empty($experienceNotesDetails[0])) {
                                            $i =1;
                                            foreach($experienceNotesDetails as $key => $row)
                                            {
                                                if(!empty($row->title) && !empty($row->notes))
                                                {
                                                ?>
                                        <div class="note_list__item">

                                            <div class="sub_heading">
                                                {{$row->title}}
                                                <span class="date">{{date('H:i d/m/Y',strtotime($row->updated_at))}}</span>
                                            </div>

                                            <p>
                                               {{$row->notes}}
                                            </p>

                                        </div>
                                        <?php } } }  ?>
                                       

                                    </div>

                                   

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
    
    <!-- start popup -->

    <div class="account_popup" style="display: none;">


    </div>

    <!-- end popup -->
</div>

<script>
    var updated = 0;
    $(document).ready(function(){
        $(document).on('click','#addInclusion', function(){
            $("#appendInclusions div.list__item").last().clone().appendTo($("#appendInclusions"));
            $("#appendInclusions div.list__item").last().find('input').val('');
            $('.removeInclusion').css('display','block'); 
        });
        $(document).on('click','.removeInclusion', function(){
            if($("#appendInclusions div.list__item").length == 2){
                $('.removeInclusion').hide(); 
            }
            $(this).closest('div').remove();
        });
        $(document).on("click", "#expFormSubmit", function(e){
            // var desc = CKEDITOR.instances.e_description.getData();
            // $('#e_description').html(desc);
            e.preventDefault();
            var exp_name = $('.popup_content #exp_name').val();
            var reason_considaring = $('.popup_content #reason_considaring').val();
            var estimated_cost_pp = $('.popup_content #estimated_cost_pp').val();
            var estimated_cost_in_pp = $('.popup_content #estimated_in_rate').val();
            var estimated_cost_pp_euro = $('.popup_content #estimated_cost_pp_euro').val();
            var estimated_cost_in_pp_euro = $('.popup_content #estimated_in_rate_euro').val();
            var story = $('.popup_content #story').val();
             var address = $('#address').val();
            var street = $('#street').val();
            var city = $('#city').val();
            var postcode = $('#postcode').val();
            var country = $('#country').val();
             var latitude = $('#latitude').val();
            var longitude = $('#longitude').val();
            if(exp_name == '' || reason_considaring == '' || estimated_cost_pp == '' || estimated_cost_in_pp == '' || estimated_cost_pp_euro == '' || estimated_cost_in_pp_euro == '' || story == '' || address == ''  || city == '' || postcode == '' || country == '' || latitude == '' || longitude == '')
            {
                if(exp_name == '')
                {
                    $('.exp_error').show();
                    $('.popup_content #exp_name').focus();
                }
                else
                {
                    $('.exp_error').hide();
                }
                if(reason_considaring == '')
                {
                    $('.reason_error').show();
                }
                else
                {
                    $('.reason_error').hide();
                }
                if(estimated_cost_pp == '')
                {
                    $('.eastimated_error').show();
                }
                else
                {
                    $('.eastimated_error').hide();
                }
                 if(estimated_cost_in_pp == '')
                {
                    $('.eastimated_in_error').show();
                }
                else
                {
                    $('.eastimated_in_error').hide();
                }
                if(estimated_cost_pp_euro == '')
                {
                    $('.eastimated_euro_error').show();
                }
                else
                {
                    $('.eastimated_euro_error').hide();
                }
                 if(estimated_cost_in_pp_euro == '')
                {
                    $('.eastimated_in_euro_error').show();
                }
                else
                {
                    $('.eastimated_in_euro_error').hide();
                }
                if(story == '')
                {
                    $('.story_error').show();
                }
                else
                {
                    $('.story_error').hide();
                }
                 if(address == '')
                {
                    $('.address_error').show();
                }
                else
                {
                    $('.address_error').hide();
                }
                if(city == '')
                {
                    $('.city_error').show();
                }
                else
                {
                    $('.city_error').hide();
                }
                if(postcode == '')
                {
                    $('.postcode_error').show();
                }
                else
                {
                    $('.postcode_error').hide();
                }
                if(country == '')
                {
                    $('.country_error').show();
                }
                else
                {
                    $('.country_error').hide();
                }
                if(latitude == '')
                {
                    $('.latitude_error').show();
                }
                else
                {
                    $('.latitude_error').hide();
                }
                if(longitude == '')
                {
                    $('.longitude_error').show();
                }
                else
                {
                    $('.longitude_error').hide();
                }
                alert("Please enter required fields.");
            }
            else
            {
            var formData = $("#expData").serialize();
            $('.loader').show();    
            $.ajax({
                url: base_url+'/super-user/update-experiance-details',
                type: 'POST',
                data: {'formData':formData},
                success: function(data) {
                    $('.loader').hide(); 
                    toastSuccess('Experience updated successfully.');
                    location.reload(); 
                },
                error: function(e) {
                }
            }); 
            }  
        });
        $("#editExperiance").bind("click", function(e){
            var exp_id = $(this).data('id');
            $('.loader').show();    
            $.ajax({
                url: base_url+'/super-user/get-experiance-details',
                type: 'POST',
                data: {'exp_id':exp_id},
                success: function(data) {
                    $('.account_popup').html(data);
                    $('.loader').hide();  
                    $('.account_popup').show();
                },
                error: function(e) {
                }
            });   
        });
         $("#editNotes").bind("click", function(e){
            var experience_id = $(this).data('id');
            $('.loader').show();    
            $.ajax({
                url: base_url+'/super-user/get-experience-notes',
                type: 'POST',
                data: {'experience_id':experience_id},
                success: function(data) {
                    $('.account_popup').html(data);
                    $('.loader').hide();  
                    $('.account_popup').show();
                },
                error: function(e) {
                }
            });   
        });
         $(document).on("click", "#hotelNotesFormSubmit", function(e){
            e.preventDefault();
            var hotelName = $("#hotelName").val();
            if(hotelName == ''){
                $("#hotelName").addClass('borderRed');
                toastError('Hotel name is required.');
            }else{
                var formData = $("#hotelNotesData").serialize();
                $('.loader').show();    
                $.ajax({
                    url: base_url+'/super-user/update-experience-notes',
                    type: 'POST',
                    data: {'formData':formData},
                    success: function(data) {
                        $('.loader').hide(); 
                        toastSuccess('Experience updated successfully.');
                        location.reload(); 
                    },
                    error: function(e) {
                    }
                }); 
            }  
        });
        $(document).on("click", "#closePopup", function(e){
            $(this).closest('.account_popup').hide();
        });
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