
<?php 
    $exp_id = array();
if(!empty($tour_list[0])){
        foreach($tour_list as $row)
        {
            $exp_id[] =$row->id;
            ?>
            <tr>
                <td scope="row"> {{$row->name}} </td>
                <td scope="row">{{!empty($row->display_count)?$row->display_count:'0'}}</td>
                <td scope="row">
                    <label class="checkbox_div ">
                      <input type="checkbox"  <?=!empty($row->display_count)?'checked="checked"':''?> class="custom_chkbox driver_paying " value="{{$row->id}}" name="add_review" data-id="{{$row->id}}"> <span class="notClickedCls"></span>
                      <span class="checkmark"></span>
                     <!--  <span class="sk_label">Paying</span> -->
                    </label>
                </td>
               
            </tr>  
            <?php
        }
    } 
    if(!empty($hotelList[0])){
        foreach($hotelList as $row)
        {
            if(!in_array($row->id,$exp_id))
            {
                $exp_id[] =$row->id;
                ?>
                <tr>
                    <td scope="row"> {{$row->name}} </td>
                    <td scope="row">{{!empty($row->display_count)?$row->display_count:'0'}}</td>
                    <td scope="row">
                        <label class="checkbox_div ">
                          <input type="checkbox" class="custom_chkbox show_review "  <?=!empty($row->display_count)?'checked="checked"':''?> value="{{$row->id}}" name="add_review" data-id="{{$row->id}}"> <span class="notClickedCls"></span>
                          <span class="checkmark"></span>
                         <!--  <span class="sk_label">Paying</span> -->
                        </label>
                    </td>
                   
                </tr>  
            <?php
            }
        }
    } 
    if(!empty($tours_list[0])){
        foreach($tours_list as $row)
        {
            if(!in_array($row->id,$exp_id))
            {
               
                ?>
                <tr>
                    <td scope="row"> {{$row->name}} </td>
                    <td scope="row">{{!empty($row->display_count)?$row->display_count:'0'}}</td>
                    <td scope="row">
                        <label class="checkbox_div ">
                          <input type="checkbox" class="custom_chkbox show_review "  <?=!empty($row->display_count)?'checked="checked"':''?> value="{{$row->id}}" name="add_review" data-id="{{$row->id}}"> <span class="notClickedCls"></span>
                          <span class="checkmark"></span>
                         <!--  <span class="sk_label">Paying</span> -->
                        </label>
                    </td>
                   
                </tr>  
            <?php
            }
        }
    } 
    if(empty($tour_list[0]) && empty($hotelList[0]) && empty($tours_list[0])){ ?> 
         <tr><td colspan="3">No Data Found</td></tr>
    <?php } ?>