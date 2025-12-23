<div class="accLogo" style="height: auto;width: auto;border-radius: 5px;max-width:220px;">
    <?php 
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
        <li class=" @if($open_menu == 'alerts') active @endif">
            <a class="menuLink" href="{{ route('account-alerts') }}">
                <span class="icon"><i class="fas fa-bell"></i></span>
                <span class="text">Alerts</span>
            </a>
        </li>
        <?php if(check_superuser_access('1')){ ?>
        <li class="hasAccSubmenu @if($open_menu == 'bookings') active @endif">
            <a class="menuLink" href="javascript:;">
                <span class="icon"><i class="fas fa-calendar-check"></i></span>
                <span class="text">Bookings</span>
            </a>
            <div class="submenuHolder">
                <ul class="submenuList">
                    {{-- <li>
                        <a href="javascript:;">Current Tours</a>
                    </li> --}}
                    <li @if($sub_marked == 'current_bookings') class="active"@endif>
                        <a href="{{ route('account-superuser') }}">Current Tours</a>
                    </li>
                    <li @if($sub_marked == 'hold-tours') class="active"@endif>
                        <a href="{{ route('hold-tours') }}">Prov Held Tours</a>
                    </li>
                    
                    <li @if($sub_marked == 'current_cruise') class="active"@endif>
                        <a href="{{ route('account-cruise-superuser') }}">Current Cruises</a>
                    </li>
                    <li @if($sub_marked == 'completed_bookings') class="active"@endif>
                        <a href="{{ route('account-superuser-completed') }}">Completed Bookings</a>
                    </li>
                    <li @if($sub_marked == 'pending_bookings') class="active"@endif>
                        <a href="{{ route('account-superuser-pending') }}">Pending Cancellations</a>
                    </li>
                    <li @if($sub_marked == 'cancelled_bookings') class="active"@endif>
                        <a href="{{ route('account-superuser-cancelled') }}">Cancelled Bookings</a>
                    </li>
                    {{-- 
                    <li @if($sub_marked == 'saved_bookings') class="active"@endif>
                        <a href="">Saved Bookings</a>
                    </li> 
                    --}}
                </ul>
            </div>
        </li>
        <?php } ?>
        <?php if(check_superuser_access('3')){ ?>
        <li class="hasAccSubmenu @if($open_menu == 'product') active @endif">
            <a class="menuLink" href="javascript:;">
                <span class="icon"><i class="fas fa-file-contract"></i></span>
                <span class="text">Product</span>
            </a>
            <div class="submenuHolder">
                <ul class="submenuList">
                    <li @if($sub_marked == 'products_tour') class="active"@endif>
                        <a href="{{ route('tours') }}">Tours</a>
                    </li>
                    <li @if($sub_marked == 'prototypes') class="active"@endif>
                        <a href="{{ route('prototypes') }}">Prototypes</a>
                    </li>
                    <li @if($sub_marked == 'current_products') class="active"@endif>
                        <a href="{{ route('products') }}">Product Pipeline (EPS)</a>
                    </li>
                    <li @if($sub_marked == 'product_hotel') class="active"@endif>
                        <a href="{{ route('products-hotel') }}">HoPS</a>
                    </li>
                    <li class="">
                        <a href="javascript:;">CPS</a>
                    </li>
                    <li class="">
                        <a href="javascript:;">Availability Calendar</a>
                    </li>
                    <li @if($sub_marked == 'bespoke_enquiries') class="active"@endif>
                        <a href="{{ route('bespoke-enquiries') }}">Enquiries</a>
                    </li>
                </ul>
            </div>
        </li>
        <?php } ?>
        <?php if(check_superuser_access('6')){ ?>
        <li class="hasAccSubmenu @if($open_menu == 'database') active @endif">
            <a class="menuLink" href="">
                <span class="icon"><i class="fas fa-database"></i></span>
                <span class="text">Database</span>
            </a>
            <div class="submenuHolder">
                <ul class="submenuList">
                    <li @if($sub_marked == 'collaborators') class="active"@endif>
                        <a href="{{ route('database-collaborators') }}">Collaborators</a>
                    </li>
                    <li @if($sub_marked == 'hotels') class="active"@endif>
                        <a href="{{ route('database-hotels') }}">Hotels</a>
                    </li>
                    <li @if($sub_marked == 'experiences') class="active"@endif>
                        <a href="{{ route('database-experiences') }}">Experiences</a>
                    </li>
                    <li @if($sub_marked == 'ships') class="active"@endif>
                        <a href="{{ route('database-ships') }}">Cruises</a>
                    </li>
                    <!-- <li @if($sub_marked == 'company') class="active"@endif>
                        <a href="{{ route('database-company') }}">Company</a>
                    </li> -->
                </ul>
            </div>
        </li>
        <?php } ?>
        <?php if(check_superuser_access('7')){ ?>
         <li class="hasAccSubmenu @if($open_menu == 'invoice') active @endif">
            <a class="menuLink" href="">
                <span class="icon"><i class="fas fa-file-contract"></i></span>
                <span class="text">Finance</span>
            </a>
            <div class="submenuHolder">
                <ul class="submenuList">
                    <li @if($sub_marked == 'current_bookings_invoice') class="active"@endif>
                        <a href="{{ route('acc-invoice') }}">Invoicing</a>
                    </li>
                    <li @if($sub_marked == 'current_bookings_invoice_history') class="active"@endif>
                        <a href="{{ route('acc-invoice-history') }}">Invoicing History</a>
                    </li>
                   
                </ul>
            </div>
        </li>
        <?php } ?>
        <?php if(check_superuser_access('2')){ ?>
		  <li class="hasAccSubmenu @if($open_menu == 'bespoke') active @endif">
            <a class="menuLink" href="">
                <span class="icon"><i class="fas fa-suitcase-rolling" ></i></span>
                <span class="text"  >Bespoke</span>
            </a>
            <div class="submenuHolder">
                <ul class="submenuList">
                    <li @if($sub_marked == 'bespoke_tour_builder') class="active"@endif>
                        <a href="{{ route('bespoke-tour-builder') }}">Bespoke Tour Builder</a>
                    </li>
                    <li @if($sub_marked == 'bespoke_tour_builder_map') class="active"@endif>
                        <a href="{{ route('bespoke-tour-builder-map-1') }}">Bespoke Map Tour Builder</a>
                    </li>
                   
                    <li @if($sub_marked == 'bespoke_enquiries') class="active"@endif>
                        <a href="{{ route('bespoke-enquiries') }}">Your Enquiries</a>
                    </li>
                </ul>
            </div>
        </li>
        <?php } ?>
        <?php if(check_superuser_access('8')){ ?>
        <li class="hasAccSubmenu @if($open_menu == 'stocklist') active @endif">
            <a class="menuLink" href="">
                <span class="icon"><i class="fas fa-calendar-alt"></i></span>
                <span class="text">Stock List</span>
            </a>
            <div class="submenuHolder">
                <ul class="submenuList">
                    <li @if($sub_marked == 'stocklist-hotel') class="active"@endif>
                        <a href="{{ route('stocklist-hotel') }}">Hotel Dates</a>
                    </li>
                    <li @if($sub_marked == 'stocklist-ship') class="active"@endif>
                        <a href="{{ route('ship-stocklist') }}">Cruises Dates</a>
                    </li>
                </ul>
            </div>
        </li> 
       <?php } ?>
        {{-- <li class="hasAccSubmenu @if($open_menu == 'bespoke') active @endif">
            <a class="menuLink" href="">
                <span class="icon"><i class="fas fa-suitcase-rolling"></i></span>
                <span class="text">Bespoke</span>
            </a>
            <div class="submenuHolder">
                <ul class="submenuList">
                </ul>
            </div>
        </li> --}}


        <!-- <li class="hasAccSubmenu">
            <a class="menuLink" href="javascript:;">
                <span class="icon"><i class="fas fa-file-contract"></i></span>
                <span class="text">Analytics</span>
            </a>
            <div class="submenuHolder">
                <ul class="submenuList">
                    <li class="">
                        <a href="javascript:;">Weekly Analytics Report</a>
                    </li>
                    <li class="">
                        <a href="javascript:;">Internal Analytics</a>
                    </li>
                </ul>
            </div>
        </li> -->
        <?php if(check_superuser_access('4')){ ?>
        <li class=" @if($open_menu == 'analytics') active @endif">
            <a class="menuLink" href="{{ route('analytics') }}">
                <span class="icon"><i class="fas fa-file-contract"></i></span>
                <span class="text">Analytics</span>
            </a>
        </li>
       <?php } ?>
        <li class="hasAccSubmenu">
            <a class="menuLink" href="javascript:;">
                <span class="icon"><i class="fas fa-user"></i></span>
                <span class="text">Account</span>
            </a>
            <div class="submenuHolder">
                <ul class="submenuList">
                </ul>
            </div>
        </li>
       
    </ul>
</div>
<span class="whiteHolder"></span>
