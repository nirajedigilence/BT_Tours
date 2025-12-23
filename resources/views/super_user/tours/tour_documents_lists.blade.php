<style>
    .green-active {
        color: green !important;
        border-color: green !important;
    }
    a.marginTop15.clearBothCls.float-left.dis-label {
    width: 15%;
    }
</style>
<!-- <div class="notIndexContainer" style="margin-bottom: 200px; width: 100%;">
    <div class="guestlist_container"> -->
<div>
<div class="tour_dates_header" style="padding: 10px;font-weight: bold;color: #000;">
                    Tour Dates - {{date('d-M-Y',strtotime($experice_dates[0]->date_from))}} - {{date('d-M-Y',strtotime($experice_dates[0]->date_to))}}
                </div>
<?php 
   
            if(!empty($experice_dates)){
                foreach ($experice_dates as $k => $val) {
                    $experience_dates_id = $val->id;
                    if(!empty($experience_dates_id))
                                    {
                                        $doc_completed = array();
                                    
                                        $doc_completed = 


DB::connection('mysql_veenus')->table('experience_dates')->selectRaw('experience_dates.id,experience_dates.mark_as_completed,experience_dates.dates_rates_id')
                                                                ->where('experience_dates.id', $experience_dates_id)
                                                                //->where('experience_dates.mark_as_completed','1')
                                                                ->get()->toArray();
                                        //pr($doc_completed);                                                        
                                        if(!empty($doc_completed))
                                        {
                                            $doc_completed_etc = 


DB::connection('mysql_veenus')->table('experience_dates_rates')->selectRaw('experience_dates_rates.id,experience_dates_rates.mark_as_completed_etc')
                                                                ->where('experience_dates_rates.id', $doc_completed[0]->dates_rates_id)
                                                                ->get()->toArray();
                                            //pr($doc_completed_etc);                                                        
                                        }
                                         }  
                    ?>

                    <div class="tour_dates activeDate" style="border: 1px solid #ddd;padding: 15px 15px 5px;box-shadow: 0px 3px 6px #00000029;margin-bottom: 15px;float: left;width: 100%;"><div class="Collabrator-name activeDate" style="border: 1px solid #ddd;padding: 15px 15px 5px;box-shadow: 0px 3px 6px #00000029;margin-bottom: 15px;">{{$val->name}}</div><div class="tour_date " style="box-shadow:none;border:0;padding:0;margin-bottom:10px;">
                               <!--  <div class="date" style="font-weight:400;margin-left:0;"><b></b><br></div> 
                                    <div class="documents">
                                        <div class="document" style="height: auto;border: 0;padding: 0;font-size: 12px;font-weight: bold;">
                                           
                                        </div>
                                        
                                    </div>-->
                                </div><div class="tour_date " style="box-shadow:none;border:0;padding:0;margin-bottom:10px;">
                                <div class="date" style="font-weight:400;margin-left:0;"></div>
                                    <div class="documents">
                                        <div class="document checked" data-id="667" data-exid="59">
                                            <div class="tick"></div>
                                          
                                            <div class="label">  <a target="_blank" class="marginTop15 clearBothCls float-left dis-label <?=(!empty($doc_completed) && !empty($doc_completed[0]->mark_as_completed) && !empty($doc_completed_etc) && !empty($doc_completed_etc[0]->mark_as_completed_etc))?'green-active':''?> " data-id="{{ !empty($val->experiences_id)?$val->experiences_id:'' }}" href="<?php echo 'tours/show/'; ?>{{ !empty($val->tour_id)?$val->tour_id:'' }}/{{ !empty($val->experiences_id)?$val->experiences_id:'' }}"><?=(!empty($doc_completed) && !empty($doc_completed[0]->mark_as_completed) && !empty($doc_completed_etc) && !empty($doc_completed_etc[0]->mark_as_completed_etc))?'Document Completed':'Document Not Completed'?></a>
                                                <!-- <?php if(!empty($val->cart_exp_id)){ ?> 
                                           
                                             <a target="_blank" href="/tour-overview/{{$val->cart_exp_id}}" class="marginTop15 clearBothCls float-left dis-label">
                                              <?=!empty($val->cart_exp_id)?'Booked':'Unbooked'?>
                                            </a>
                                        <?php } else { ?> 
                                       <label class="al-label">Unbooked</label>
                                        <?php } ?> -->
                                            </div>
                                        </div>
                                    </div>
                                </div></div>
                    <?
                }
            }
        ?>
<!-- </div>
</div> -->
</div>