<style type="text/css">
    .download-data p {
    margin-top: 10px;
    margin-bottom: 0;
}
</style>

@foreach($items as $key => $item)
            <?php $realese_date = date('d/m/Y', strtotime($item->created_at. ' + '.$item->hold_days.' day'));
            $hold_date = date('Y-m-d H:i:s', strtotime($item->created_at. ' + '.($item->hold_days+1).' day')); ?>
            <div class="bookingForm" id="rightColInfo-{{ $item->id }}">
                <div class="tourInfoCont">
                    <div class="infoBox">
                        <span class="left">Put on hold</span>
                        <span class="right">{{ date('d/m/Y', strtotime($item->created_at)) }}</span>
                    </div>
                    <div class="infoBox">
                        <span class="left">On hold for</span>
                        <span class="right">{{ ($item->hold_days == 1) ? $item->hold_days.' day': $item->hold_days.' days' }}</span>
                    </div>
                    <div class="infoBox">
                        <span class="left">Realese date</span>
                        <span class="right">{{ $realese_date }}</span>
                    </div>
                    <div class="infoBox">
                        <span class="left">On hold left</span>
                        <?php ?>
                        <span class="right"><?php echo get_days($hold_date);?></span>
                    </div>
                    
                </div>
              

                <a target="_blank" href="/experience/{{$item->experiences_id}}" class="orangeLink">
                  Preview Tour
                </a>
                <a onclick="return confirm('Are you  sure you want to Book Tour?')" href="/finalize-cart/?cart_exp_id={{$item->id}}" class="orangeLink">
                  Book Tour
                </a>
                <?php  if (Auth::user()->hasRole("Super Admin")){ ?> 
                <button type="button" class="orangeLink" data-toggle="modal" data-target="#buttonsModal{{$item->id}}">
                  Extend Hold Time
                </button>
                <?php } ?>
                <a onclick="return confirm('Are you  sure you want to Release Tour?')" href="/delete-cart-experience-hold/{{$item->id}}" class="orangeLink">
                  Release Tour
                </a>
              
                <button type="button" class="orangeLink" data-toggle="modal" data-target="#holdDateModal{{$item->id}}">
                  Other dates on hold
                </button>
                 <div class="modal fade" id="holdDateModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$item->id}}" aria-hidden="true">

                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel{{$item->id}}">Other dates on hold</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      
                      <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php 
                                      $dates_rates_id = $item->dates_rates_id;
                                         $experience_dates = App\Models\Cms\ExperienceDate::selectRaw('experience_dates.id,experience_dates.date_from,experience_dates.date_to,experience_dates.hotel_date_id,experience_dates.dates_rates_id')->leftjoin('cart_experiences as c','c.dates_rates_id','=','experience_dates.dates_rates_id')->where('experience_dates.dates_rates_id',$dates_rates_id)->where('experience_dates.deleted_at', null)->where('experience_dates.hotel_date_id','!=', null)->where('c.id', $item->id)->get();
                                       
                                        if(!empty($experience_dates[0]))
                                        {
                                            foreach($experience_dates as $erow)
                                            {
                                               /* $tourDatesExist = ExperienceDate::selectRaw('experience_dates.id,experience_dates.mark_as_completed,experience_dates.sign_name_hc,experience_dates.dates_rates_id,experience_dates.hotel_date_id,experience_dates.date_from,experience_dates.date_to,c.id as cart_exp_id')->leftjoin('cart_experiences as c','c.dates_rates_id','=','experience_dates.dates_rates_id')->where('experience_dates.date_from', $erow->date_from)->where('experience_dates.date_to', $erow->date_to)->where('c.id', null)->get();*/
                                                 $tourDatesExist = App\Models\Cms\ExperienceDate::selectRaw('experience_dates.id,experience_dates.dates_rates_id,experience_dates.hotel_date_id,experience_dates.date_from,experience_dates.date_to,e.name as exp_name')->leftjoin('experiences as e','e.id','=','experience_dates.experiences_id')->where('experience_dates.hotel_date_id', $erow->hotel_date_id)->where('experience_dates.is_date_hold', '1')->get();
                                                
                                                    if(!empty($tourDatesExist))
                                                    {
                                                        ?>
                                                        <table cellpadding="1" cellspacing="5">
                                                            <!-- <tr>
                                                                <td><b>Tour dates list</b></td>
                                                                
                                                            </tr> -->
                                                        
                                                        <?php
                                                        foreach($tourDatesExist as $trow)
                                                        {

                                                           ?>
                                                           <tr style="border: 1px solid #ccc;">
                                                               <td style="padding: 10px;"><h5>{{$trow->exp_name}}</h5>
                                                                <div class="col-lg-12">
                                                                    <?php 
                                                                        $tourDatesExistData = App\Models\Cms\ExperienceDate::selectRaw('experience_dates.id,experience_dates.date_from,experience_dates.date_to,h.name as hotel_name')->leftjoin('hotel_dates as ht','ht.id','=','experience_dates.hotel_date_id')->leftjoin('hotels as h','h.id','=','ht.hotel_id')->where('experience_dates.dates_rates_id', $trow->dates_rates_id)->get();
                                                                        if(!empty($tourDatesExistData))
                                                                        {
                                                                            foreach($tourDatesExistData as $hrow)
                                                                            {
                                                                                ?>
                                                                                <p> - {{$hrow->hotel_name}} : {{ date("D d M", strtotime($hrow->date_from)) }} - {{ date("D d M 'y", strtotime($hrow->date_to)) }}</p>
                                                                                <?php
                                                                            }
                                                                        }
                                                                    ?>
                                                                </div></td>
                                                              <!--  <td><b>&nbsp;</b></td> -->
                                                              <!--  <td style="text-align: center;">{{ date("D d M", strtotime($trow->date_from)) }} - {{ date("D d M 'y", strtotime($trow->date_to)) }}</td> -->
                                                           </tr>
                                                           <?php
                                                           
                                                            
                                                        }
                                                        ?>
                                                    </table>
                                                        <?php
                                                    }
                                                    
                                                   
                                            }
                                        }
                                        else{
                                             ?>
                                             <h6>No tour dates found.</h6>
                                        <?php
                                        }
                                        ?>
                                </div>
                            </div>
                      </div>
                      <!-- <div class="modal-footer">
                         <a href="javascript:void(0);" class="add_cta btn btn-primary" id="onHoldTour">
                                Save
                        </a>
                        <input type="hidden" name="cart_exp_id" id="cart_exp_id" value="{{$item->id}}">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div> -->
                    </div>
                  </div>
                </div>
                <div class="modal fade" id="buttonsModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$item->id}}" aria-hidden="true">
                  <?php 
                     $cart_experience1 = 


DB::connection('mysql_veenus')->table('cart_experiences')->where("id", $item->id)->first();
                    if(!empty($cart_experience1)){
                        $cart_experiences = 


DB::connection('mysql_veenus')->table('experiences')->where('id', $cart_experience1->experiences_id)->first();
                    }
                    ?>
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel{{$item->id}}">Extend Hold Time</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      
                      <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        
                                        <input class="form-control" type="text" name="hold_days" id="hold_days" value="{{$item->hold_days}}">
                                        <span id="text_error" style="display:none;color: red;">Pease enter number of days to hold</span>
                                    </div>
                                </div>
                            </div>
                      </div>
                      <div class="modal-footer">
                         <a href="javascript:void(0);" class="add_cta btn btn-primary" id="onHoldTour">
                                Save
                        </a>
                        <input type="hidden" name="cart_exp_id" id="cart_exp_id" value="{{$item->id}}">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
    @endforeach
<script type="text/javascript">
    $('#onHoldTour').on('click', function(){

        var days = $('#hold_days').val();
        
        if(days != '')
        {
            $('#text_error').hide();
            $('#hold_tour_days').val(days);
            $('#holdToutModal').modal('hide');
            var cart_exp_id = $('#cart_exp_id').val();
            $.ajax({
            url: base_url+'/save-hold-days',
            type: 'POST',
            data: {'days':days,'cart_exp_id':cart_exp_id},
            success: function(data) {
               
                toastSuccess('Save successfully.');
                window.location.reload();  
            },
            error: function(e) {
            }
        });  
        }
        else
        {
            $('#text_error').show();
        }
        
    });
</script>