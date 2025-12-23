@extends('layouts.front')

@section('content')
<style type="text/css">
    ul.parsley-errors-list li {
        color: red;
    }
    .notClickedCls{font-weight: 600;    font-size: 14px;}
    .field-title{font-weight: 600; }
</style>
<div class="notIndexContainer">

    <div class="accountContainer">
        <div class="accountRow">

            <div class="leftCol">
                @include('partials.super_user_left',['open_menu' => 'database', 'sub_marked' => 'collaborators']);
            </div>

            <div class="account_main_content">

                <div class="left_column">
                    @if(session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                    @if(session()->has('success'))
                        <div class="alert alert-success" style="background: lightcyan;">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <div class="hotel_header">

                        <div class="logo__hotel_details">

                             <!-- added by niral 1-3-2022 -->
                                <?php if(!empty($accountInfo->logo)){ ?>
                                    <div class="logo" style="background-color: #fff;height: 150px;width: 150px;">
                                    <img style=" padding: 15px;" src="<?php echo !empty($accountInfo->logo) ? url('/').'/account_images/'.$accountInfo->logo : ''; ?>">
                                    </div>
                                    <?php } else { ?>
                                        <div class="logo">Logo</div>
                                    <?php } ?>
                            

                            <div class="hotel_details">

                                <div class="name">
                                    {{$collaborator->name}}
                                </div>
                                
                                <div class="location">
                                    <div>-</div>
                                </div>

                            </div>

                        </div>

                        <div class="ctas">

                            <a href="#" class="alerts_cta" style="background: #ddd;pointer-events: none;">
                                <div class="icon"></div>
                                <div class="label">(1) Alerts</div>
                            </a>

                            <a href="javascript:;" class="settings_cta" id="editCollab" data-id="{{$collaborator->id}}"></a>

                        </div>

                    </div>

                    <div class="hotel">

                        <div class="column">

                            <div class="section with_padding">

                                <div class="main_heading">
                                    Contacts
                                    <a href="javascript:;" class="cta" id="viewEdit" data-id="{{$collaborator->id}}">view & edit</a>
                                </div>

                                <div id="contacts" style="display: block;/*max-width: 550px;overflow-y: hidden;*/">
                                    <div class="row">
                                    <?php
                                    if(isset($collaboratorDetails->contacts) && !empty($collaboratorDetails->contacts)){
                                        $unserialize = unserialize($collaboratorDetails->contacts);
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
                                                            <a class="link" href="tel:{{$value['contact_number']}}">{{$value['contact_number']}}</a>
                                                        </div>

                                                    </div>

                                                    <div class="list__item">

                                                        <div class="sub_heading">
                                                            Email
                                                        </div>

                                                        <div>
                                                            <a href="mailto:{{$value['email']}}" class="link" style="overflow-wrap: break-word;">
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

                                
                                <div id="general_info">

                                    <div class="column">

                                        <div class="list">
                                            <div class="list__item">

                                                <div class="sub_heading">
                                                    Address
                                                </div>

                                                <div>
                                                    <?php echo isset($collaboratorDetails->address) ? $collaboratorDetails->address : ''; ?>
                                                </div>

                                            </div>

                                            <div class="list__item">

                                                <div class="sub_heading">
                                                    General Email
                                                </div>

                                                <div>
                                                    <a href="mailto:<?php echo $collaborator->email; ?>" class="link">
                                                        <?php echo $collaborator->email; ?>
                                                    </a>
                                                    
                                                </div>

                                            </div>
                                            <div class="list__item">

                                                <div class="sub_heading">
                                                    Website Link
                                                </div>

                                                <div>
                                                    <a target="_balnk" href="<?php echo isset($collaboratorDetails->website_link) ? $collaboratorDetails->website_link : ''; ?>" class="link">
                                                        <?php echo isset($collaboratorDetails->website_link) ? $collaboratorDetails->website_link : ''; ?>
                                                    </a>
                                                </div>

                                            </div>

                                            <div class="list__item">

                                                <div class="sub_heading">
                                                    Social Media 2
                                                </div>

                                                <div>
                                                    <a target="_balnk" href="<?php echo isset($collaboratorDetails->social_media_link_2) ? $collaboratorDetails->social_media_link_2 : ''; ?>" class="link">
                                                        <?php echo isset($collaboratorDetails->social_media_link_2) ? $collaboratorDetails->social_media_link_2 : ''; ?>
                                                    </a>
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
                                                    <?php if(!empty($collaboratorDetails->main_contact_number)){ ?> 
                                                    <a class="link" href="tel:{{$collaboratorDetails->main_contact_number}}">{{$collaboratorDetails->main_contact_number}}</a>
                                                    <?php } ?>
                                                    
                                                </div>

                                            </div>

                                            <div class="list__item">

                                                <div class="sub_heading">
                                                    Owner
                                                </div>

                                                <div>
                                                    <?php echo isset($collaboratorDetails->owner) ? $collaboratorDetails->owner : ''; ?>
                                                </div>

                                            </div>

                                            

                                            <div class="list__item">

                                                <div class="sub_heading">
                                                    Social Media 1
                                                </div>

                                                <div>
                                                    <a target="_balnk" href="<?php echo isset($collaboratorDetails->social_media_link_1) ? $collaboratorDetails->social_media_link_1 : ''; ?>" class="link">
                                                        <?php echo isset($collaboratorDetails->social_media_link_1) ? $collaboratorDetails->social_media_link_1 : ''; ?>
                                                    </a>
                                                </div>

                                            </div>

                                            <div class="list__item">

                                                <div class="sub_heading">
                                                    Social Media 3
                                                </div>

                                                <div>
                                                    <a target="_balnk" href="<?php echo isset($collaboratorDetails->social_media_link_3) ? $collaboratorDetails->social_media_link_3 : ''; ?>" class="link">
                                                        <?php echo isset($collaboratorDetails->social_media_link_3) ? $collaboratorDetails->social_media_link_3 : ''; ?>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                          <!--   <div class="section with_padding">

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

                            </div> -->

                            <div class="section_split">

                                <div class="section with_padding">

                                    <div class="main_heading">
                                        CPS
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
                                    if(!empty($image)){
                                        echo '<img src="'.asset('storage/'.$image->file).'" style="width: 100%;">';
                                    }else{
                                    ?>
                                    <img src="{{ asset('images/database/hotels/placeholder-image.jpg') }}" style="height: 360px;width: 100%;"/>
                                    <?php } ?>
                                
                            </div>

                            <div class="section with_padding">

                                <div id="map">

                                    <iframe src="{{ isset($collaboratorDetails->map_link) ? $collaboratorDetails->map_link : '' }}" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

                                </div>

                            </div>

                            <div class="section with_padding">

                                <div class="main_heading">
                                    Notes   <a href="javascript:;" class="cta" id="editNotes" data-id="{{$collaborator->id}}">edit</a>
                                </div>

                                <div id="notes">

                                    <div class="note_list">
                                        <?php if(!empty($collaboratorNotesDetails[0])) {
                                            $i =1;
                                            foreach($collaboratorNotesDetails as $key => $row)
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
    <?php 
    $is_sub = Session::get('sub_account');
    if(!empty($is_sub))
    {
        Session::forget('sub_account');  
        ?>
        /*$(function() {
            var collab_id = '<?=$collaborator->id?>';
            $('.loader').show();    
            $.ajax({
                url: base_url+'/super-user/get-collab-details',
                type: 'POST',
                data: {'collab_id':collab_id},
                success: function(data) {
                    $('.account_popup').html(data);
                    $('.loader').hide();  
                    $('.account_popup').show();
                },
                error: function(e) {
                }
            }); 
        });*/
        <?php
    }
     ?>
    var updated = 0;
    $(document).ready(function(){
        
        $(document).on("click", "#collabFormSubmit", function(e){
            e.preventDefault();
            
            var formData = $("#collabData").serialize();
            $('.loader').show();    
            $.ajax({
                url: base_url+'/super-user/update-collab-details',
                type: 'POST',
                data: {'formData':formData},
                success: function(data) {
                    $('.loader').hide(); 
                    toastSuccess('Collaborator updated successfully.');
                    location.reload(true); 
                },
                error: function(e) {
                }
            }); 
             
        });
        $("#editCollab").bind("click", function(e){
            var collab_id = $(this).data('id');
            $('.loader').show();    
            $.ajax({
                url: base_url+'/super-user/get-collab-details',
                type: 'POST',
                data: {'collab_id':collab_id},
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
            var collab_id = $(this).data('id');
            $('.loader').show();    
            $.ajax({
                url: base_url+'/super-user/get-collab-contact-details',
                type: 'POST',
                data: {'collab_id':collab_id},
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
            var collaborator_id = $(this).data('id');
            $('.loader').show();    
            $.ajax({
                url: base_url+'/super-user/get-collaborator-notes',
                type: 'POST',
                data: {'collaborator_id':collaborator_id},
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
                    url: base_url+'/super-user/update-collaborator-notes',
                    type: 'POST',
                    data: {'formData':formData},
                    success: function(data) {
                        $('.loader').hide(); 
                        toastSuccess('Collaborator updated successfully.');
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
        // $(".hasAccSubmenu .menuLink").bind("click", function(e){
        //     e.preventDefault();
        //     if ($(this).parent().hasClass("open")) {
        //         $(this).parent().removeClass("open");
        //         $(this).parent().children(".submenuHolder").slideUp();
        //     }else {
        //         $(this).parent().addClass("open");
        //         $(this).parent().children(".submenuHolder").slideDown();
        //     }
        // });

    });
</script>

@endsection