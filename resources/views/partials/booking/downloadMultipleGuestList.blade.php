<div>
<h3>Download Guest List</h3>	
<?php 
$over_night = 0;$secondary = 0;
if(!empty($experienceDates) && count($experienceDates) > 1){
	    foreach ($experienceDates as $key => $value) {  
	    	if($value['experience_type'] == '3')
            {
            	$over_night++;
            }
            if($value['experience_type'] == '2')
            {
            	$secondary++;
            	
            }
            if($value['experience_type'] == '1')
            { ?> 
            	<div class="col-lg-12 mt-2">
            	<h4> <?=($value['experience_type'] == 1)?'Primary Guest List':(($value['experience_type'] == 2)?'Secondary '.($secondary != '1'?$secondary:''):'Overnight '.$over_night )?><br><p>(<?php echo $value['hotel_name'];?>)
                    </h4>
            	<a target="_blank" href="{{route('download-guest-list-pdf',$cart_experience[0]->id)}}" class="btn btn-primary">
                       Download</a>
            </div>
            <?php } else { ?> 
            	<div class="col-lg-12 mt-2">
            	<h4> <?=($value['experience_type'] == 1)?'Primary Guest List':(($value['experience_type'] == 2)?'Secondary '.($secondary != '1'?$secondary:''):'Overnight '.$over_night )?><br><p>(<?php echo $value['hotel_name'];?>)
                    </h4>
            	<a target="_blank" href="/download-multiguest-list-pdf/<?=$cart_experience[0]->id.'/'.$value['id']?>" class="btn btn-primary">
                       Download</a>
            </div>
            <?php } ?>
            
	
<?php }  } ?>
</div>