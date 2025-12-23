@extends('layouts.front')

@section('content')

<div class="notIndexContainer">

    <div class="accountContainer">
        <div class="accountRow">

            <div class="leftCol">
                @include('partials.super_user_left',['open_menu' => 'database', 'sub_marked' => 'hotels']);
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
                                    {{$hotel->name}}
                                </div>
                                <?php
                                $country = '';
                                if(!empty($hotel->countryarea->countries_id)){
                                    $country = 


DB::connection('mysql_veenus')->table('countries')->where("id", $hotel->countryarea->countries_id)->first();
                                }
                                ?>
                                <div class="location">
                                    <div><?php echo (isset($country->name) ? $country->name.' - ' : ''); ?><?php echo (isset($hotel->countryarea->name) ? $hotel->countryarea->name : '-'); ?></div>
                                </div>

                            </div>

                        </div>

                        <div class="ctas">

                            <a href="#" class="alerts_cta" style="background: #ddd;pointer-events: none;">
                                <div class="icon"></div>
                                <div class="label">(1) Alerts</div>
                            </a>

                            <a href="javascript:;" class="settings_cta" id="editHotel" data-id="{{$hotel->id}}"></a>

                        </div>

                    </div>

                    <div class="hotel">

                        <div class="column">

                            <div class="section with_padding">

                                <div class="main_heading">
                                    Contacts
                                     <a href="javascript:;" class="cta" id="viewEdit" data-id="{{$hotel->id}}">view & edit</a>
                                </div>

                                 <div id="contacts" style="display: block;/*max-width: 550px;overflow-y: hidden;*/">
                                    <div class="row">
                                     <?php
                                    if(isset($hotel->contacts) && !empty($hotel->contacts)){
                                        $unserialize = unserialize($hotel->contacts);
                                        if(!empty($unserialize)){
                                            foreach ($unserialize as $key => $value) {
                                                $main = '';
                                                if(isset($value['main_contact']) && $value['main_contact'] == 'on'){
                                                    $main = 'Main Contact';
                                                }
                                            ?>
                                            <div class="<?=(count($unserialize) <= 2)?'col-md-6':'col-md-4'?> pl-0 pr-0">
                                                <div class="column">

                                                    <div class="heading">
                                                        {{$value['title']}}
                                                    </div>

                                                    <div class="list">

                                                        <div class="list__item">

                                                            <div class="sub_heading">
                                                                Name
                                                            </div>

                                                            <div>
                                                                {{$value['name']}}
                                                            </div>

                                                        </div>

                                                        <div class="list__item">

                                                            <div class="sub_heading">
                                                                Position
                                                            </div>

                                                            <div>
                                                                {{$value['position']}}
                                                            </div>

                                                        </div>

                                                        <div class="list__item">

                                                            <div class="sub_heading">
                                                                Contact nr
                                                            </div>

                                                            <div>
                                                                <span class="orange"><a href="tel:<?php echo str_replace(' ', '', $value['contact_number']); ?>" style="color:#FCA311;">{{$value['contact_number']}}</a></span>
                                                            </div>

                                                        </div>

                                                        <div class="list__item">

                                                            <div class="sub_heading">
                                                                Email
                                                            </div>

                                                            <div>
                                                                <a href="mailto:{{$value['email']}}" class="link">
                                                                    {{$value['email']}}
                                                                </a>
                                                            </div>

                                                        </div>
                                                        <div class="list__item">
                                                            <?php if(!empty($main)){ ?>
                                                            <div class="alert-success" style="text-align: center;font-weight: 600;background: #0D1629;color: #fff;">{{$main}}</div>
                                                            <?php } ?>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                            
                                        <?php 
                                            }
                                        }
                                    }else{
                                        echo 'No contacts found!';
                                    } ?>
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
                                        <?php echo $hotel->description; ?>
                                    </p>

                                </div>

                                <div id="general_info">

                                    <div class="column">

                                        <div class="list">
                                            <div class="list__item">

                                                <div class="sub_heading">
                                                    Leisure facilities
                                                </div>

                                                <div>
                                                    <?php echo $hotel->leisure_amenity; ?>
                                                </div>

                                            </div>

                                            <div class="list__item">

                                                <div class="sub_heading">
                                                    Coach parking
                                                </div>

                                                <div>
                                                    <?php echo $hotel->parking_amenity; ?>
                                                </div>

                                            </div>
                                            <div class="list__item" style="margin-top: 30px;">

                                                <div class="sub_heading">
                                                    Address
                                                </div>

                                                <div>
                                                    <?php
                                                    $address = array();
                                                    if(!empty($hotel->street)){
                                                        $address[] = $hotel->street;
                                                    } 
                                                    if(!empty($hotel->city)){
                                                        $address[] = $hotel->city;
                                                    } 
                                                    if(!empty($hotel->country)){
                                                        $address[] = $hotel->country;
                                                    } 
                                                    if(!empty($hotel->postcode)){
                                                        $address[] = $hotel->postcode;
                                                    } 
                                                    echo implode(', ', $address); ?>
                                                </div>

                                            </div>

                                            <div class="list__item">

                                                <div class="sub_heading">
                                                    General email
                                                </div>

                                                <div>
                                                    <?php echo $hotel->email; ?>
                                                </div>

                                            </div>

                                            

                                            <div class="list__item">

                                                <div class="sub_heading">
                                                    Trip advisor
                                                </div>

                                                <div>
                                                    <a target="_balnk" href="<?php echo $hotel->triadvisor_url; ?>" class="link">
                                                        <?php echo $hotel->triadvisor_url; ?>
                                                    </a>
                                                </div>

                                            </div>

                                            <div class="list__item">

                                                <div class="sub_heading">
                                                    Gallery or virtual tour
                                                </div>

                                                <div>
                                                    <a href="#" class="link">
                                                        all.accor.com/hotel/B540/index.en.shtml
                                                    </a>
                                                </div>

                                            </div>

                                            <div class="list__item list__item__download">

                                                <div class="sub_heading">
                                                    Sample menu
                                                </div>

                                                <div class="download">

                                                    <div class="file">
                                                        <i class="fas fa-file-pdf"></i>
                                                        menu.pdf
                                                    </div>

                                                    <div class="ctas">
                                                        <a href="#" class="cta">view</a>
                                                        <a href="#" class="cta">re-upload</a>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="column">

                                        <div class="list">
                                            <div class="list__item">

                                                <div class="sub_heading">
                                                    Lift
                                                </div>

                                                <div>
                                                    <?php echo $hotel->lift_access_amenity; ?>
                                                </div>

                                            </div>
                                            <div class="list__item">

                                                <div class="sub_heading">
                                                    Porterage
                                                </div>

                                                <div>
                                                    <?php echo $hotel->porterage_amenity; ?>
                                                </div>

                                            </div>
                                            <div class="list__item" style="margin-top: 30px;">

                                                <div class="sub_heading">
                                                    Main phone number
                                                </div>

                                                <div>
                                                <a href="tel:<?php echo str_replace(' ', '', $hotel->phone); ?>" style="color:#FCA311;"><?php echo $hotel->phone; ?></a>
                                                </div>

                                            </div>

                                            <div class="list__item">

                                                <div class="sub_heading">
                                                    Owner
                                                </div>

                                                <div>
                                                    <?php echo $hotel->owner; ?>
                                                </div>

                                            </div>

                                            

                                            <div class="list__item">

                                                <div class="sub_heading">
                                                    Website
                                                </div>

                                                <div>
                                                    <a target="_balnk" href="<?php echo $hotel->website; ?>" class="link">
                                                        <?php echo $hotel->website; ?>
                                                    </a>
                                                </div>

                                            </div>

                                            <div class="list__item">

                                                <div class="sub_heading">
                                                    Booking.com
                                                </div>

                                                <div>
                                                    <a target="_balnk" href="<?php echo $hotel->booking_url; ?>" class="link">
                                                        <?php echo $hotel->booking_url; ?>
                                                    </a>
                                                </div>

                                            </div>
                                            <div class="list__item">

                                                <div class="sub_heading">
                                                    Brand
                                                </div>

                                                <div>
                                                    <?php echo $hotel->brand; ?>
                                                </div>

                                            </div>

                                            <div class="list__item list__item__download">

                                                <div class="sub_heading">
                                                    HC template
                                                </div>

                                                <div class="download">

                                                    <div class="file">
                                                        <i class="fas fa-file-pdf"></i>
                                                        SherwoodHC
                                                    </div>

                                                    <div class="ctas">
                                                        <a href="#" class="cta">view</a>
                                                        <a href="#" class="cta">edit</a>
                                                    </div>

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
                                            <a href="#" class="cta">completed bookings</a>
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

                                            <div class="booking">
                                                <div>Regal scotland</div>
                                                <div>Sat 23 Jul - Fri 30 Jun '21</div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="column">

                                        <div class="heading">
                                            Next 3 bookings
                                            <a href="#" class="cta">completed bookings</a>
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
                                        HoPS
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

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="column">

                            <div class="section">
                                <?php
                                if(isset($hotel_image[0]) && $hotel_image[0]){
                                ?>
                                    <img src="{{ asset('/storage/'.$hotel_image[0]['file']) }}" />
                                <?php }else{ ?>
                                    <img src="{{ asset('images/database/hotels/placeholder-image.jpg') }}" style="height: 360px;width: 100%;"/>
                                <?php } ?>
                            </div>

                            <div class="section with_padding">

                                <div id="map">

                                    <iframe src="<?php echo $hotel->location_link; ?>" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

                                </div>

                            </div>

                            <div class="section with_padding">

                                <div class="main_heading">
                                    Notes   <a href="javascript:;" class="cta" id="editNotes" data-id="{{$hotel->id}}">edit</a>
                                </div>

                                <div id="notes">

                                    <div class="note_list">
                                        <?php if(!empty($hotelNotesDetails[0])) {
                                            $i =1;
                                            foreach($hotelNotesDetails as $key => $row)
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
        $(document).on('click','#addAmenity', function(){
            if(($("#appendAmenities div.list__item").length == 1) && ($("#appendAmenities div.list__item").css('display') == 'none')){
                $("#appendAmenities div.list__item").show(); 
            }else{
                $("#appendAmenities div.list__item").last().clone().appendTo($("#appendAmenities"));
                $("#appendAmenities div.list__item").last().find('input').val('');
                $('.removeAmenity').css('display','block'); 
            }
        });
        $(document).on('click','.removeAmenity', function(){
            if($("#appendAmenities div.list__item").length == 1){
                $("#appendAmenities div.list__item").last().find('input').val('');
                $("#appendAmenities div.list__item").hide(); 
            }else{
                $(this).closest('div').remove();
            }
        });
        $(document).on("click", "#hotelFormSubmit", function(e){
            e.preventDefault();
            var hotelName = $("#hotelName").val();
            if(hotelName == ''){
                $("#hotelName").addClass('borderRed');
                toastError('Hotel name is required.');
            }else{
                var formData = $("#hotelData").serialize();
                $('.loader').show();    
                $.ajax({
                    url: base_url+'/super-user/update-hotel-details',
                    type: 'POST',
                    data: {'formData':formData},
                    success: function(data) {
                        $('.loader').hide(); 
                        toastSuccess('Hotel updated successfully.');
                        location.reload(); 
                    },
                    error: function(e) {
                    }
                }); 
            }  
        });
        $("#editHotel").bind("click", function(e){
            var hotel_id = $(this).data('id');
            $('.loader').show();    
            $.ajax({
                url: base_url+'/super-user/get-hotel-details',
                type: 'POST',
                data: {'hotel_id':hotel_id},
                success: function(data) {
                    $('.account_popup').html(data);
                    $('.loader').hide();  
                    $('.account_popup').show();
                },
                error: function(e) {
                }
            });   
        });
        $("#viewEdit").bind("click", function(e){
            var hotel_id = $(this).data('id');
            $('.loader').show();    
            $.ajax({
                url: base_url+'/super-user/get-hotel-contact-details',
                type: 'POST',
                data: {'hotel_id':hotel_id},
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
            var hotel_id = $(this).data('id');
            $('.loader').show();    
            $.ajax({
                url: base_url+'/super-user/get-hotel-notes',
                type: 'POST',
                data: {'hotel_id':hotel_id},
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
                    url: base_url+'/super-user/update-hotel-notes',
                    type: 'POST',
                    data: {'formData':formData},
                    success: function(data) {
                        $('.loader').hide(); 
                        toastSuccess('Hotel updated successfully.');
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