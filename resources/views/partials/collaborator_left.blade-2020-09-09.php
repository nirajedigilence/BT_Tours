<div class="accLogo">
    <img src="{{ asset('images/hotel-logo.png') }}" alt="logo">
</div>
<div class="accName">{{ Auth::user()->name }}</div>
<div class="accMenu">
    <ul class="menuList">
        <li>
            <a class="menuLink" href="">
                <span class="icon"><i class="fas fa-bell"></i></span>
                <span class="text">Alerts</span>
            </a>
        </li>
        <li class="hasAccSubmenu @if($open_menu == 'bookings') active @endif">
            <a class="menuLink" href="">
                <span class="icon"><i class="fas fa-calendar-check"></i></span>
                <span class="text">Bookings</span>
            </a>
            <div class="submenuHolder">
                <ul class="submenuList">
                    <li @if($sub_marked == 'current_bookings') class="active"@endif>
                        <a href="{{ route('account-collaborator') }}">Current Bookings</a>
                    </li>
                    <li @if($sub_marked == 'completed_bookings') class="active"@endif>
                        <a href="{{ route('account-collaborator-completed') }}">Completed Bookings</a>
                    </li>
                    <li @if($sub_marked == 'future_bookings') class="active"@endif>
                        <a href="">Future Bookings</a>
                    </li>
                    <li @if($sub_marked == 'saved_bookings') class="active"@endif>
                        <a href="">Saved Bookings</a>
                    </li>
                </ul>
            </div>
        </li>
        <li>
            <a class="menuLink" href="">
                <span class="icon"><i class="fas fa-file-contract"></i></span>
                <span class="text">Contracts</span>
            </a>
        </li>
        <li>
            <a class="menuLink" href="">
                <span class="icon"><i class="fas fa-chart-bar"></i></span>
                <span class="text">Analytics</span>
            </a>
        </li>
        <li>
            <a class="menuLink" href="">
                <span class="icon accIcon"><i class="fas fa-user"></i></span>
                <span class="text">Account</span>
            </a>
        </li>
    </ul>
</div>
<span class="whiteHolder"></span>
