<?php 
$months=array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
$current_month=date('n');
$current_year=$year;
$current_day=date('d');
$month=0;?>
     <div class="calendarTitleMainCls">
            <div class="calendarTitleCls">
                <span class="calendariconCls">
                    <a href="javascript:void(0);" class="calenderLoadCls" data-year="{{ $year-1 }}" title="{{ $year-1 }}" ><i class="fas fa-chevron-left"></i></a>
                </span>
                <div class="calendarYearCls">{{$current_year}}</div>
                <span class="calendariconCls">
                    <a href="javascript:void(0);" class="calenderLoadCls" data-year="{{ $year+1 }}" title="{{ $year+1 }}"><i class="fas fa-chevron-right"></i></a>
                </span>
            </div>
        </div>
<?php 
    echo '<table class="calendar">';
        for ($row=1; $row<=3; $row++) {
            echo '<tr>';
            for ($column=1; $column<=4; $column++) {
                echo '<td class="month">';


                $first_day_in_month=date('w',mktime(0,0,0,$month,1,$current_year));
                $month_days=date('t',mktime(0,0,0,$month,1,$current_year));
                
                // in PHP, Sunday is the first day in the week with number zero (0)
                // to make our calendar works we will change this to (7)
                if ($first_day_in_month==0){
                    $first_day_in_month=7;
                }
                $month++;
                echo '<table>';
                echo '<th colspan="7">'.$months[$month-1].'</th>';
                echo '<tr class="days"><td>M</td><td>T</td><td>W</td><td>T</td><td>F</td>';
                echo '<td class="sat">S</td><td class="sun">S</td></tr>';
                echo '<tr>';
                    for($i=1; $i<$first_day_in_month; $i++) {
                        echo '<td> </td>';
                    }
                    for($day=1; $day<=$month_days; $day++) {
                        $pos=($day+$first_day_in_month-1)%7;
                        $class = (($day==$current_day) && ($month==$current_month)) ? 'today' : 'day';
                        $class .= ($pos==6) ? ' sat' : '';
                        $class .= ($pos==0) ? ' sun' : '';

                        echo '<td class="'.$class.'" data-date="'.$current_year.'-'.sprintf('%02d',$month).'-'.sprintf('%02d',$day).'" data-day="'.$day.'" data-month="'.$month.'" data-year="'.$current_year.'">'.$day.'</td>';
                        if ($pos==0) echo '</tr><tr>';
                    }
                echo '</tr>';
                echo '</table>';

                echo '</td>';
            }
            echo '</tr>';
        }

    echo '</table>';
?>