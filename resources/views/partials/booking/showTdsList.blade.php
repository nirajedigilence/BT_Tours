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
                  <th scope="col"><b>Hotel</b></th>
                  <th scope="col"><b>Date</b></th>
                  <th scope="col"><b>Document completed</b></th>
                  <th scope="col"><b>Document Signed</b></th>
                  <th scope="col"><b></b></th>
                 
                </tr>
                   </thead>
                   <tbody  class="main_tours">
                   <?php if(!empty($experienceDates)){
                        foreach($experienceDates as $row)
                        {       
                            ?>
                            <tr>
                                <td scope="row"> {{$row->hotel_name}} </td>
                                <td scope="row">{{date('D d M y',strtotime($row->date_from))}} - {{date('D d M y',strtotime($row->date_to))}}</td>
                                <td scope="row">
                                     @if(!empty($row->hotelAmendement->mark_as_completed_tds))
                                     <img src="{{ asset('images/squtick.png') }}" alt="Veenus">
                                     @else
                                     <img src="{{ asset('images/cronss.png') }}" alt="Veenus">
                                     @endif
                                </td>
                                <td scope="row">
                                     @if(!empty($row->hotelAmendement->hotel_sign))
                                     <img src="{{ asset('images/squtick.png') }}" alt="Veenus">
                                     @else
                                     <img src="{{ asset('images/cronss.png') }}" alt="Veenus">
                                     @endif
                                    
                                </td>
                                <td>
                                     <a href="javascript:;"   data-tour="<?=URL('show-tds/'.$cart_experience->id.'/'.$row->id)?>" data-tab="collaborator" class="btn btn-primary tourPackBox ">Open</a>
                                    <!-- <a class="btn btn-primary" data-fancybox="" data-type="ajax" data-src="" href="<?=URL('show-tds/'.$cart_experience->id)?>" id="reloadInfo407">Open</a> --></td>
                            </tr>  
                            <?php
                        }
                    } else { ?> 
                         <tr><td colspan="3">No Data Found</td></tr>
                    <?php } ?>
                         
                    </tbody>
                    </table>
                       
                     
                    </div>
               </div>
        </div>
      
   </div>
