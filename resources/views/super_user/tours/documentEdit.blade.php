@extends('layouts.front')

@section('content')

<div class="notIndexContainer">

    <div class="tour_documents_edit_popup">

        <div class="popup_content">

            <div class="heading">
                Edit tour documents
            </div>

            <div class="tour_dates_header">
                Tour Dates
            </div>

            <div class="tour_dates">

                <div class="tour_date">

                    <div class="date">
                        Mon 03 May - Fri 07 May '21 (4 nights)
                    </div>

                    <div class="documents">

                        <div class="document">

                            <div class="icon">
                                <i class="fas fa-file-pdf"></i>
                            </div>

                            <div class="label">HC</div>

                        </div>

                        <div class="document">
                            
                            <div class="icon">
                                <i class="fas fa-file-pdf"></i>
                            </div>
                            
                            <div class="label">ETC</div>
                            
                        </div>

                        <div class="document">
                            
                            <div class="icon">
                                <i class="fas fa-file-pdf"></i>
                            </div>
                            
                            <div class="label">EC</div>
                            
                        </div>

                        <div class="document checked">

                            <div class="tick"></div>
                            
                            <div class="icon">
                                <i class="fas fa-file-pdf"></i>
                            </div>
                            
                            <div class="label">TP</div>
                            
                        </div>

                        <div class="document">
                            
                            <div class="icon">
                                <i class="fas fa-file-pdf"></i>
                            </div>
                            
                            <div class="label">TPH</div>
                            
                        </div>

                    </div>

                </div>

                <div class="tour_date">

                    <div class="date">
                        Mon 03 May - Fri 07 May '21 (4 nights)
                    </div>

                    <div class="documents">

                        <div class="document">

                            <div class="icon">
                                <i class="fas fa-file-pdf"></i>
                            </div>

                            <div class="label">HC</div>

                        </div>

                        <div class="document">
                            
                            <div class="icon">
                                <i class="fas fa-file-pdf"></i>
                            </div>
                            
                            <div class="label">ETC</div>
                            
                        </div>

                        <div class="document">
                            
                            <div class="icon">
                                <i class="fas fa-file-pdf"></i>
                            </div>
                            
                            <div class="label">EC</div>
                            
                        </div>

                        <div class="document">

                            <div class="tick"></div>
                            
                            <div class="icon">
                                <i class="fas fa-file-pdf"></i>
                            </div>
                            
                            <div class="label">TP</div>
                            
                        </div>

                        <div class="document">
                            
                            <div class="icon">
                                <i class="fas fa-file-pdf"></i>
                            </div>
                            
                            <div class="label">TPH</div>
                            
                        </div>

                    </div>

                </div>

                <div class="tour_date checked">

                    <div class="date">
                        Mon 03 May - Fri 07 May '21 (4 nights)
                    </div>

                    <div class="documents">

                        <div class="document">

                            <div class="icon">
                                <i class="fas fa-file-pdf"></i>
                            </div>

                            <div class="label">HC</div>

                        </div>

                        <div class="document checked">

                            <div class="tick"></div>
                            
                            <div class="icon">
                                <i class="fas fa-file-pdf"></i>
                            </div>
                            
                            <div class="label">ETC</div>
                            
                        </div>

                        <div class="document">
                            
                            <div class="icon">
                                <i class="fas fa-file-pdf"></i>
                            </div>
                            
                            <div class="label">EC</div>
                            
                        </div>

                        <div class="document checked">

                            <div class="tick"></div>
                            
                            <div class="icon">
                                <i class="fas fa-file-pdf"></i>
                            </div>
                            
                            <div class="label">TP</div>
                            
                        </div>

                        <div class="document">
                            
                            <div class="icon">
                                <i class="fas fa-file-pdf"></i>
                            </div>
                            
                            <div class="label">TPH</div>
                            
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