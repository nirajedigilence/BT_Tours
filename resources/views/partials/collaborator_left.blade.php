<div class="accLogo" style="height: auto;width: auto;border-radius: 5px;max-width:220px;">
    <?php 
    $userdata = Session::get('sub_account_data');
    if(isset($userdata) && !empty($userdata))
    {
        $user =  


DB::connection('mysql_veenus')->table('users')->where("id",$userdata['id'])->first();
        if(!empty($user->parent_user))
        {
            $sub_account_data = array(
                'id' =>$user->id,
                'parent_user' =>$user->parent_user,
                'name' =>$user->name,
                'email' =>$user->email,
                'title' =>$user->title,
                'access_section' =>$user->access_section
            );
            Session::put('sub_account_data',$sub_account_data);
        }
    }
    $accountInfo = 


DB::connection('mysql_veenus')->table('account_info')->where("user_id", auth()->user()->id)->first();
    if(!empty($accountInfo->logo)){ ?>
        <img src="<?php echo !empty($accountInfo->logo) ? url('/').'/account_images/'.$accountInfo->logo : ''; ?>" alt="logo">
    <?php }else{ ?>
        <img src="../images/your-logo.png" alt="logo">
    <?php } ?>
</div>
<div class="accName">{{ Auth::user()->name }}</div>
<div class="accMenu">
    <ul class="menuList">
        <li class="@if($open_menu == 'alerts') active @endif">
            <a class="menuLink" href="{{ route('account-alerts') }}">
                <span class="icon"><i class="fas fa-bell"></i></span>
                <span class="text">Alerts</span>
            </a>
        </li>
        <?php if(check_subaccount_access('1')){ ?>
        <li class="hasAccSubmenu @if($open_menu == 'bookings') active @endif">
            <a class="menuLink" href="">
                <span class="icon"><i class="fas fa-calendar-check"></i></span>
                <span class="text">Bookings</span>
            </a>
            <div class="submenuHolder">
                <ul class="submenuList">
                    <li @if($sub_marked == 'current_bookings') class="active"@endif>
                        <a href="{{ route('account-collaborator') }}">Current Tours</a>
                    </li>
                     <li @if($sub_marked == 'hold-tours') class="active"@endif>
                        <a href="{{ route('hold-tours') }}">Prov Held Tours</a>
                    </li>
               
                    <li @if($sub_marked == 'current_cruise') class="active"@endif>
                        <a href="{{ route('account-cruise-collaborator') }}">Current Cruises</a>
                    </li>
                    <li @if($sub_marked == 'completed_bookings') class="active"@endif>
                        <a href="{{ route('account-collaborator-completed') }}">Completed Bookings</a>
                    </li>
                     <li @if($sub_marked == 'cancelled_bookings') class="active"@endif>
                        <a href="{{ route('account-collaborator-cancelled') }}">Cancelled Bookings</a>
                    </li>
                    <!-- <li>
                        <a href="#">Cancelled Bookings</a>
                    </li> -->
                    <li>
                        <a href="#">Liked Tours</a>
                    </li>
                    <!-- <li @if($sub_marked == 'future_bookings') class="active"@endif>
                        <a href="#">Future Bookings</a>
                    </li>
                    <li @if($sub_marked == 'saved_bookings') class="active"@endif>
                        <a href="#">Saved Bookings</a>
                    </li> -->
                </ul>
            </div>
        </li>
        <?php } ?>
        <?php if(check_subaccount_access('3')){ ?>
        <li class="hasAccSubmenu @if($open_menu == 'products') active @endif">
            <a class="menuLink" href="" style="pointer-events: none;">
                <span class="icon"><i class="fas fa-file-contract" style="color: #60605B;"></i></span>
                <span class="text"  style="color:#60605B;">Product</span>
            </a>
            <div class="submenuHolder">
                <ul class="submenuList">
                    <li @if($sub_marked == 'products') class="active"@endif>
                        <a href="{{ route('products-collaborator') }}" style="pointer-events: none;color: #ddd;">Product prototypes</a>
                    </li>
                </ul>
            </div>
        </li>
        <?php } ?>
        <?php if(check_subaccount_access('2')){ ?>
        <li class="hasAccSubmenu @if($open_menu == 'bespoke') active @endif">
            <a class="menuLink" href="">
                <span class="icon"><i class="fas fa-suitcase-rolling" ></i></span>
                <span class="text"  >Bespoke</span>
            </a>
            <div class="submenuHolder">
                <ul class="submenuList">
                    <li @if($sub_marked == 'bespoke_tour_builder') class="active"@endif>
                        <a href="{{ route('account-collaborator-bespoke-tour-builder') }}">Bespoke Tour Builder</a>
                    </li>
                    <li @if($sub_marked == 'bespoke_enquiry_form') class="active"@endif>
                        <a href="{{ route('account-collaborator-bespoke-enquiry-form') }}">Enquiry Form</a>
                    </li>
                    <li @if($sub_marked == 'bespoke_enquiries') class="active"@endif>
                        <a href="{{ route('account-collaborator-enquiries-list') }}">Your Enquiries</a>
                    </li>
                </ul>
            </div>
        </li>
        <?php } ?>

        <!-- <li>
            <a class="menuLink" href="">
                <span class="icon"><i class="fas fa-file-contract"></i></span>
                <span class="text">Contracts</span>
            </a>
        </li> -->
        <?php if(check_subaccount_access('4')){ ?>
        <!-- <li class=" @if($open_menu == 'analytics') active @endif">
            <a class="menuLink" href="{{ route('analytics') }}"  style="pointer-events: none;">
                <span class="icon"  style="color:#60605B;"><i class="fas fa-file-contract"></i></span>
                <span class="text"  style="color:#60605B;">Analytics</span>
            </a>
        </li> -->
        <?php } ?>
        
        <li class="_hasAccSubmenu @if($open_menu == 'account') active @endif"">
            <a class="menuLink" href="{{ route('change-password') }}">
                <span class="icon accIcon"><i class="fas fa-user"></i></span>
                <span class="text">Account</span>
            </a>
            <!-- <div class="submenuHolder">
                <ul class="submenuList">
                    <li>
                        <a href="#">Change Personal Details</a>
                    </li>
                    <li @if($sub_marked == 'change_password') class="active"@endif>
                        <a href="{{ route('change-password') }}">Change Password</a>
                    </li>
                    <li>
                        <a href="#">Change Profile Photo</a>
                    </li>
                </ul>
            </div> -->
        </li>
        
    </ul>
</div>
<span class="whiteHolder"></span>
