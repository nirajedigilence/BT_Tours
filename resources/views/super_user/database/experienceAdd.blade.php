@extends('layouts.front')

@section('content')

<div class="notIndexContainer">

    <div class="accountContainer">
        <div class="accountRow">

            <div class="leftCol">
                @include('partials.super_user_left',['open_menu' => 'database', 'sub_marked' => 'experiences']);
            </div>

            <div class="account_main_content">

     

            </div>

        </div>

    </div>

</div>


@endsection