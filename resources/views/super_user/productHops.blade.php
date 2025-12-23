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

                    

                </div>

                <div class="right_column">

                    <div class="intro">

                        <div class="heading mb_0">
                            Angel Hotel Cardiff
                        </div>

                        <div class="percentage">
                            86%
                        </div>

                        <div class="percentage_label">
                            HOPS
                        </div>

                    </div>

                    <div class="hops_header">

                        <div>
                            Owner
                            <span>Accor</span>
                        </div>

                        <div>
                            Brand
                            <span>Mariott</span>
                        </div>

                    </div>

                    <div class="hops_scores">

                        <div class="result">

                            <div class="column">
                                <div class="label">RR / OptionRooms</div>
                                <div class="input">Good</div>
                            </div>

                            <div class="column score">
                                <div class="label">Score</div>
                                <div class="input">3</div>
                            </div>

                        </div>

                        <div class="result">

                            <div class="column">
                                <div class="label">Flexibility</div>
                                <div class="input">Great</div>
                            </div>

                            <div class="column score">
                                <div class="input">3</div>
                            </div>

                        </div>

                        <div class="result">

                            <div class="column">
                                <div class="label">Tour Pack</div>
                                <div class="input">Good</div>
                            </div>

                            <div class="column score">
                                <div class="input">2</div>
                            </div>

                        </div>

                        <div class="result">

                            <div class="column">
                                <div class="label">Problem Resolution</div>
                                <div class="input">Yes, v.good & didn't ne</div>
                            </div>

                            <div class="column score">
                                <div class="input">3</div>
                            </div>

                        </div>

                        <div class="result">

                            <div class="column">
                                <div class="label">Veenus Charter</div>
                                <div class="input">Yes, v.good & didn't ne</div>
                            </div>

                            <div class="column score">
                                <div class="input">3</div>
                            </div>

                        </div>

                    </div>

                    <div class="hops_footer">

                        <div class="label">
                            Total:
                        </div>

                        <div class="total_score">
                            14
                        </div>

                        <div class="ctas">

                            <a href="#" class="cta">
                                <i class="fas fa-sticky-note"></i>    
                            </a>

                            <a href="#" class="cta">
                                <i class="fas fa-edit"></i>    
                            </a>

                            <a href="#" class="cta red">
                                <i class="fas fa-minus-circle"></i>
                            </a>

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