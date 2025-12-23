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
                <?php if(Auth::user()->hasRole("Collaborator")){ ?>
                    @include('partials.collaborator_left',['open_menu' => 'alerts', 'sub_marked' => '']);
                <?php }else{ ?>
                    @include('partials.super_user_left',['open_menu' => 'alerts', 'sub_marked' => '']);
                <?php } ?>
            </div>

            <div class="middleCol">
                @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif
            @if(Session::has('success'))
                            <div class="alert alert-success">
                                <span class="glyphicon glyphicon-ok"></span>
                                {!! session('success') !!}

                                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                            </div>
                        @endif
                <div class="intro">

                    <div class="greeting">
                        Hello,
                    </div>

                    <div class="alert_count">
                        There are <?php echo array_sum($totalcount)+$reqCount; ?> alerts
                    </div>

                </div>
                <?php
                if (Auth::check() && Auth::user()->hasRole("Super Admin")){
                ?>
                <div class="alerts_nav_wrapper">

                    <ul class="alerts_nav">

                        <li>
                            <a href="#" class="active">
                                Collaborators (<?php echo array_sum($totalcount)+$reqCount; ?>)
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                Hotels (0)
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                Attractions (0)
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                Cruises (0)
                            </a>
                        </li>

                    </ul>

                    <div class="search_sort">

                        <div class="search">
                            <input type="text" placeholder="Search"  id="myInput" onkeyup="myFunction()">
                            <button type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>

                        <a href="#" class="sort">
                            Date<i class="fas fa-calendar-alt"></i>
                        </a>

                    </div>

                </div>
                <?php
                }
                ?>
                <ul class="alerts_sub_nav">

                    <?php
                    // pr($tourStatuses);
                    $tourAdmdmentNotes = array();
                    if(!empty($tourStatuses)){
                        foreach ($tourStatuses as $key => $value) {
                            if (Auth::check() && Auth::user()->hasRole("Collaborator")){
                                $user_id = Auth::user()->getAuthIdentifier();
                                $carts = 


DB::connection('mysql_veenus')->table('cart_experiences_to_tour_statuses')->selectRaw('cart_experiences_to_tour_statuses.*,cart_experiences.*,cart_experiences_to_tour_statuses.completed as status_completed')->join('cart_experiences','cart_experiences.id','=','cart_experiences_to_tour_statuses.cart_experiences_id')->join('carts','carts.id','=','cart_experiences.carts_id')->where("cart_experiences_to_tour_statuses.tour_statuses_id", $value->id)->where("cart_experiences_to_tour_statuses.deleted_at", null)->where("cart_experiences.deleted_at", null)->where("cart_experiences_to_tour_statuses.completed", 0)->where("cart_experiences.full_cancel", 0)->where("user_id", $user_id)->get()->toArray();
                                
                                $tourAdmdmentNotes = App\Models\Cms\ToursNotes::selectRaw('tours_notes.*,cart_experiences.*,carts.user_id')->leftjoin('cart_experiences','cart_experiences.id','=','tours_notes.cart_id')->leftjoin('carts','carts.id','=','cart_experiences.carts_id')->where('tours_notes.is_alert', '1')->where('tours_notes.category', '3')->where("carts.user_id", $user_id)->get()->toArray();
                            }else{
                                $carts = 


DB::connection('mysql_veenus')->table('cart_experiences_to_tour_statuses')->selectRaw('cart_experiences_to_tour_statuses.*,cart_experiences.*,cart_experiences_to_tour_statuses.completed as status_completed')->join('cart_experiences','cart_experiences.id','=','cart_experiences_to_tour_statuses.cart_experiences_id')->where("cart_experiences_to_tour_statuses.tour_statuses_id", $value->id)->where("cart_experiences_to_tour_statuses.deleted_at", null)->where("cart_experiences.deleted_at", null)->where("cart_experiences.full_cancel", 0)->/*where("cart_experiences_to_tour_statuses.completed", 0)->*/get()->toArray();
                                $tourAdmdmentNotes = App\Models\Cms\ToursNotes::selectRaw('tours_notes.*,cart_experiences.*,carts.user_id')->leftjoin('cart_experiences','cart_experiences.id','=','tours_notes.cart_id')->leftjoin('carts','carts.id','=','cart_experiences.carts_id')->where('is_alert', '1')->where('category', '3')->get()->toArray();
                            }
                            $count = 0;
                            $ad_count = 0;
                            if(!empty($carts)){
                                foreach ($carts as $k => $val) {
                                    $minusdays = strtotime(date("Y-m-d", strtotime($val->due_date)) . "-30 days");
                                    $today = strtotime(date('Y-m-d'));
                                    /*if($minusdays < $today){*/
                                        $reviews = '';
                                        $show = '';
                                        if($key == 10){
                                            
                                            $plusdays = strtotime(date("Y-m-d", strtotime($val->date_to)) . "+2 days");
                                            $reviews = 


DB::connection('mysql_veenus')->table('reviews')->where('cart_experience_id', $val->cart_experiences_id)->get();
                                            if($today > $plusdays && empty($reviews)){
                                                $show = 'yes';
                                            }
                                        }
                                        if($show == 'yes' || $key != 10){
                                            /*if($val->tour_statuses_id == 5 || $val->tour_statuses_id == 8)
                                            {*/
                                                $today = strtotime("today");
                                                $minusDays = strtotime($val->date_from);
                                                if($today >= $minusDays){
                                                    
                                                    continue;
                                                }
                                            /*}*/
                                            $count++;
                                        
                                        if($val->tour_statuses_id == 1){
                                        if($val->status_completed == 1)
                                        { $count--; }
                                        }

                                        if(($val->tour_statuses_id  == 5 ||$val->tour_statuses_id == 8))
                                        {
                                             if(!empty($val->deposit_invoice_sent_finance)|| !empty($val->invoice_sent_finance)){ 
                                                     $inv_id = ($val->tour_statuses_id  == 5)?$val->xero_deposit_invoice_id:$val->xero_invoice_id;

                                                    if(empty($inv_id)){
                                                    $count++;
                                                    }
                                                }
                                        }
                                    }
                                    /*}*/
                                }
                            }
                            if($key < 10){
                            ?>
                            <li>
                                <a href="javascript:;" data-id="<?php echo $value->id; ?>" class="tourStatus<?php echo ($key == 0) ? ' active' : ''; ?>">
                                    <?php
                                    if($key == 0){
                                        echo 'Contracts';
                                    }else{
                                        echo $value->name;
                                    }
                                    if(($key  == 1))
                                    {
                                    $ad_count = count($tourAdmdmentNotes);
                                    }
                                    ?>
                                    <span>(<?php echo $count+$ad_count; ?>)</span>
                                </a>
                            </li>
                            <?php
                            }
                        }
                    }
                    ?>
                    
                    <li>
                        <a href="javascript:;" data-id="11" class="tourStatus room-req-alerts">
                            Room Request
                            <span>(<?php echo $reqCount; ?>)</span>
                        </a>
                    </li>
                </ul>

                <div class="account_alerts">

                    

                </div>

            </div>


        </div>

    </div>

</div>

<script>
    
    var updated = 0;
    $(document).ready(function(){
        $(document).on("click", "#sendEmail", function(e){
            var formData = $('#sendEmailForm').serialize();
            $.ajax({
                url: '{{ route("send-contact-email") }}',
                type: 'POST',
                dataType: 'JSON',
                data: {'formData':formData},
                beforeSend: function() {
                    $('.loader').show();
                }
            }).done(function(data) {
                $('.loader').hide();
                if(data.status == 'success'){
                    toastSuccess(data.message);
                    parent.jQuery.fancybox.close();
                }else{
                    toastError(data.message);
                }
            });
        });
        ajaxCall(1);
        $(".tourStatus").bind("click", function(e){
            $(".tourStatus").removeClass('active');
            $(this).addClass('active');
            var id = $(this).data('id');
            ajaxCall(id);
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
        <?php if(Session::has('success')){
    if(session('success') == 'Dismiss alert successfully'){ ?>
        
        $('li a.room-req-alerts').trigger('click');
        <?php } }?>
    });
    function ajaxCall(id){
        $.ajax({
            url: '{{ route("get-alerts-bookings") }}',
            type: 'POST',
            dataType: 'JSON',
            data: {'id':id},
            beforeSend: function() {
                $('.loader').show();
            }
        }).done(function(data) {
            $('.account_alerts').html(data.html);
            $('.loader').hide();
        });
    }
    function myFunction() {
        // Declare variables
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById('myInput');
        filter = input.value.toUpperCase();
        var content = $(".filterContent");
        
        // Loop through all list items, and hide those who don't match the search query
        for (i = 0; i < content.length; i++) {
            a = content[i];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                content[i].closest('.account_alert').style.display = "";
            } else {
                content[i].closest('.account_alert').style.display = "none";
            }
        }
    }
</script>
@endsection
