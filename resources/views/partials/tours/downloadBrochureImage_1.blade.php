                        <div class="brochure" >
						<div class="brochure_view" id="brochure-download" style="background:#ffffff;">
                            <!--<div class="banner"></div>-->

                            <div class="page" >

                                <div class="header">

                                    <div class="logo_wrapper">
                                        <div class="logo">
                                            <img src="{{ asset('images/logo_bowling.png') }}">
                                        </div>
                                    </div>

                                </div>

                                <div class="body">

                                    <div class="column">

                                        <div class="image">
                                            <img src="{{ isset($brochures->image_1) ? $brochures->image_1 : '' }}">
                                            
                                        </div>

                                        <div class="heading">
											{{$experience->name}}
                                        </div>

                                        
										<div class="price">
                                            &pound;{{(isset($rate_pp_new) ? $rate_pp_new : '')}} pp / &pound;{{(isset($srs_pp_new) ? $srs_pp_new : '')}} SRS pp
                                        </div>

                                        <!-- <p class="large"> -->
                                            {!! isset($brochures) ? $brochures->textarea_1 : '' !!}
                                        <!-- </p> -->

                                            {!! isset($brochures) ? $brochures->textarea_2 : '' !!}
                                            {!! isset($brochures) ? $brochures->textarea_3 : '' !!}

                                        <div class="image">
                                            <img src="{{ isset($brochures->image_2) ? $brochures->image_2 : '' }}" />
                                            
                                        </div>

                                    </div>

                                    <div class="column">

                                        {!! isset($brochures) ? $brochures->textarea_4 : '' !!}


                                        <div class="image">
                                            <img src="{{ isset($brochures->image_3) ? $brochures->image_3 : '' }}" />
                                        </div>

                                        {!! isset($brochures) ? $brochures->textarea_5 : '' !!}

                                        <div class="rating">
                                            <?php
                                            if(isset($brochures->hotel_id) && !empty($brochures->hotel_id)){
                                                $brochureHotel = 


DB::connection('mysql_veenus')->table('hotels')->where('id', $brochures->hotel_id)->first();
                                            ?>
                                                <div class="label">{{$brochureHotel->name}}</div>
                                                <div class="stars">
                                                    <?php
                                                    if ( $brochureHotel->stars > 0 ){
                                                        for ($i = 0; $i < $brochureHotel->stars; $i++){
                                                            echo '<i class="fas fa-star orange"></i>';
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            <?php } ?>
                                        </div>

                                       {!! isset($brochures) ? $brochures->textarea_6 : '' !!}

                                        <div class="sub_heading">
                                            What's Included
                                        </div>

                                        <ul class="inclusions_list">
                                            <?php
                                            $brochureInclusions = array();
                                            if(isset($brochures->inclusions) && !empty($brochures->inclusions)){
                                                $brochureInclusions = unserialize($brochures->inclusions);
                                            }
                                            if(!empty($brochureInclusions)){
                                                foreach ($brochureInclusions as $key => $value) {
                                                    ?>
                                                <li><i class="far fa-check-circle"></i>{{$value}}</li>
                                                <?php 
                                                }
                                            }
                                            ?>
                                        </ul>

                                        <ul class="hotel_details">

                                            <li>
                                                <i class="far fa-calendar-alt"></i>
                                                <?php
                                                /*if(isset($brochures->dates) && !empty($brochures->dates)){
                                                    $brochureDates = unserialize($brochures->dates);
                                                    foreach ($brochureDates as $key => $value) {
                                                        echo $value.'<br>';
                                                    }
                                                }else{
													echo "Sat 10 December'22 - Thu 15 December'22 (5 nights)" ;
													
												}*/
                                                ?>
                                                <?php if(!empty($cart_experience->date_from)){ ?>
                                                    {{ date("D d M 'y", strtotime($cart_experience->date_from)) }} - {{ date("D d M 'y", strtotime($cart_experience->date_to)) }}
                                                <?php } ?>
                                            </li>

                                            <li>
                                                <i class="fas fa-utensils"></i>
                                                {{ isset($brochures) ? $brochures->breakfast : '' }}
                                            </li>

                                        </ul>

                                    </div>

                                </div>

                                 <div class="footer1">
                                    <div class="line blue"></div>
									<?php if ( !empty($brochure_email ) ) { ?>
									<div class="number">{{(isset($brochure_email) ? $brochure_email : '')}}</div>
									<?php } ?>
									<div class="line orange"></div>  
									<?php if ( !empty($brochure_tel ) ) { ?>
									<div class="number">{{(isset($brochure_tel) ? $brochure_tel : '')}}</div>
									<div class="line blue"></div>
									<?php } ?>
								</div>
									

                            </div>

                            <div class="page_separator" style="display:none;"></div>

                            <div class="page" style="display:none;"></div>

                        </div>
                        </div>
						 <div class="downloadBtn">
                            <?php $tour_name = str_ireplace( array( '\'', '"',
      ',' , ';', '<', '>',' &'), '', $experience->name);
      $tour_name = str_replace(' ', '_', $tour_name);?>
							<a class="btn btn-warning" data-tour-name="{{$tour_name}}" id="btn-Convert-Html2Image">Download </a>
						</div> 
                          <?php 
							//echo '<pre>' ; var_dump($brochures) ; echo '</pre>' ; 
							
							?>
<script>
	var element1 = jQuery("#brochure-download");
	jQuery("#btn-Convert-Html2Image").on('click', function () {
        topFunction();
        var tname = $(this).attr('data-tour-name');

    setTimeout(htmlcanvas, 2000);
	});
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
function htmlcanvas()
{
    var tname = $('#btn-Convert-Html2Image').attr('data-tour-name');;
     html2canvas(element1, {
                width: 2000,
                height: 2300,
                 onrendered: function (canvas) {
                      //  jQuery("#previewImage").append(canvas);
                        //return Canvas2Image.saveAsPNG(canvas);
                        var url = canvas.toDataURL({ pixelRatio: 3 });
                        console.log(url);
                      $("<a>", {
                        href: url,
                        download: tname
                      })
                      .on("click", function() {$(this).remove()})
                      .appendTo("body")[0].click()
                     }
                 });
}
    /*$('#save').click(function() {
          html2canvas(element1, {
            width: 2000,
            height: 2000
          }).then(function(canvas) {
            var a = document.createElement('a');
            a.href = canvas.toDataURL("image/png");
            a.download = tname+'.png';
            a.click();
          });
        });*/
</script>