<style type="text/css">
    .row.display_div {
        padding: 25px;
    }
    .review_div{
        border: 1px solid #cccccc;
        border-radius: 3px;
    }
    h4{color: #1b223c;}
</style>
   <div class="container">
        <div class="displaycls display_page1">
            <div class="row display_div">
                <div class="col-lg-12 p-0">
                    <h4>Tour Details</h4>
                    <p>&nbsp;</p>
                </div>
                <div class="col-lg-12 p-3 review_div">
                    <p><!-- <b>This review is currently displayed on these tours</b> --></p>
                    
                    <br/>
                <table class="table">
                <thead>
                <tr>
                  <th scope="col"><b>Hotel/Cuise</b></th>
                  <th scope="col"><b>Date</b></th>
                  <th scope="col"><b>Document completed</b></th>
                  <th scope="col"><b>Document Signed</b></th>
                  <th scope="col"><b></b></th>
                 
                </tr>
                   </thead>
                   <tbody  class="main_tours">
                    <?php
                    $cnt = 1;

                    if(isset($cart_experience->cartExperiencesToHotelCruiseInbound))
                    {
                     foreach ($cart_experience->cartExperiencesToHotelCruiseInbound as $keyEE => $_valueEE) { 

                         $hotel_detail = 


DB::connection('mysql_veenus')->table('hotels')->selectRaw('id,name,address,contact_number,contact_name,phone,street,city,country,postcode')->where("id", $_valueEE->hotel_id)->first();
                         $addclss = '';
                         if(!empty($_valueEE->date) || !empty($_valueEE->group_name)){
                            $addclss = 'completed';
                         }
                     ?>
                     <tr>
                                <td scope="row"> {{$hotel_detail->name}} </td>
                                <td scope="row"></td>
                                <td scope="row">
                                     @if(!empty($_valueEE->hotelAmendementCD->mark_as_completed_tds))
                                     <img src="{{ asset('images/squtick.png') }}" alt="Veenus">
                                     @else
                                     <img src="{{ asset('images/cronss.png') }}" alt="Veenus">
                                     @endif
                                </td>
                                <td scope="row">
                                     @if(!empty($_valueEE->hotelAmendementCD->hotel_sign))
                                     <img src="{{ asset('images/squtick.png') }}" alt="Veenus">
                                     @else
                                     <img src="{{ asset('images/cronss.png') }}" alt="Veenus">
                                     @endif
                                    
                                </td>
                                <td>
                                     <a href="javascript:;"   data-tour="<?=URL('show-cd-hotel/'.$cart_experience->id.'/'.$_valueEE->id.'/2')?>" data-tab="collaborator" class="btn btn-primary tourPackBox ">Open</a>
                                    <!-- <a class="btn btn-primary" data-fancybox="" data-type="ajax" data-src="" href="<?=URL('show-cd/'.$cart_experience->id)?>" id="reloadInfo407">Open</a> --></td>
                            </tr> 
                      <?php 
                        $cnt++;
                    } } ?>
                   <?php if(!empty($experienceDates)){
                        foreach($experienceDates as $row)
                        {       
                            ?>
                            <tr>
                                <td scope="row"> {{$row->hotel_name}} </td>
                                <td scope="row">{{date('D d M y',strtotime($row->date_from))}} - {{date('D d M y',strtotime($row->date_to))}}</td>
                                <td scope="row">
                                     @if(!empty($row->hotelAmendementCD->mark_as_completed_tds))
                                     <img src="{{ asset('images/squtick.png') }}" alt="Veenus">
                                     @else
                                     <img src="{{ asset('images/cronss.png') }}" alt="Veenus">
                                     @endif
                                </td>
                                <td scope="row">
                                     @if(!empty($row->hotelAmendementCD->hotel_sign))
                                     <img src="{{ asset('images/squtick.png') }}" alt="Veenus">
                                     @else
                                     <img src="{{ asset('images/cronss.png') }}" alt="Veenus">
                                     @endif
                                    
                                </td>
                                <td>
                                     <a href="javascript:;"   data-tour="<?=URL('show-cd/'.$cart_experience->id.'/'.$row->id.'/1')?>" data-tab="collaborator" class="btn btn-primary tourPackBox ">Open</a>
                                    <!-- <a class="btn btn-primary" data-fancybox="" data-type="ajax" data-src="" href="<?=URL('show-cd/'.$cart_experience->id)?>" id="reloadInfo407">Open</a> --></td>
                            </tr>  
                            <?php
                        }
                    }  ?> 
                        <?php
                            $cnt = 1;

                            if(isset($cart_experience->cartExperiencesToHotelCruiseOutbound))
                            {
                             foreach ($cart_experience->cartExperiencesToHotelCruiseOutbound as $keyEE => $_valueEE) { 

                                 $hotel_detail = 


DB::connection('mysql_veenus')->table('hotels')->selectRaw('id,name,address,contact_number,contact_name,phone,street,city,country,postcode')->where("id", $_valueEE->hotel_id)->first();
                                 $addclss = '';
                                 if(!empty($_valueEE->date) || !empty($_valueEE->group_name)){
                                    $addclss = 'completed';
                                 }
                             ?>
                              <tr>
                                <td scope="row"> {{$hotel_detail->name}} </td>
                                <td scope="row"></td>
                                <td scope="row">
                                     @if(!empty($_valueEE->hotelAmendementCD->mark_as_completed_tds))
                                     <img src="{{ asset('images/squtick.png') }}" alt="Veenus">
                                     @else
                                     <img src="{{ asset('images/cronss.png') }}" alt="Veenus">
                                     @endif
                                </td>
                                <td scope="row">
                                     @if(!empty($_valueEE->hotelAmendementCD->hotel_sign))
                                     <img src="{{ asset('images/squtick.png') }}" alt="Veenus">
                                     @else
                                     <img src="{{ asset('images/cronss.png') }}" alt="Veenus">
                                     @endif
                                    
                                </td>
                                <td>
                                     <a href="javascript:;"   data-tour="<?=URL('show-cd-hotel/'.$cart_experience->id.'/'.$_valueEE->id.'/2')?>" data-tab="collaborator" class="btn btn-primary tourPackBox ">Open</a>
                                    <!-- <a class="btn btn-primary" data-fancybox="" data-type="ajax" data-src="" href="<?=URL('show-cd/'.$cart_experience->id)?>" id="reloadInfo407">Open</a> --></td>
                            </tr> 
                        <?php 
                            $cnt++;
                        } } ?> 
                    </tbody>
                    </table>
                       
                     
                    </div>
               </div>
        </div>
      
   </div>
