<?php
  
namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use App\Models\Cms\Cart;
use DB;
class CurrentBookingExport implements FromView,WithColumnFormatting
{
    protected $id;

    function __construct(/*$sort_by,$sort_type,$month,$year,$query,$per_page,$patient_id,$therapist_id*/) {
           /* $this->sort_by = $sort_by;
            $this->sort_type = $sort_type;
            $this->month = $month;
            $this->year = $year;
            $this->query = $query;
            $this->per_page = $per_page;
            $this->patient_id = $patient_id;
            $this->therapist_id = $therapist_id;*/
     }
    public function view(): View
    {
           /* $month = $this->month;
            $year = $this->year;
            $query = $this->query;
            $per_page = $this->per_page;
            $patient_id = $this->patient_id;
            $therapist_id = $this->therapist_id;
            if(!empty($query))
            {
                $query_str = ' and (p.first_name like "%'.$query.'%" or p.last_name like "%'.$query.'%" or concat(p.first_name," ",p.last_name) like "%'.$query.'%" )';
            }
            
            $patient_str= '';
            if($patient_id != '')
            {
                $patient_str = ' and daily_therapist_visit_transection.patient_id = '.$patient_id;
            }
            $therapist_str= '';
            if($therapist_id != '')
            {
                $therapist_str = ' and daily_therapist_visit_transection.therapist_id = '.$therapist_id;
            }
            $groupBy_str = '';
            if(empty($patient_id))
            {
                $select_str = 'CONCAT(t.first_name," ",t.last_name) as therapist_name,t.id as therapist_id,GROUP_CONCAT(CONCAT(p.first_name," ",p.last_name)) as patient_name,GROUP_CONCAT(p.id) as patient_id';
                $groupBy_str = 'daily_therapist_visit_transection.therapist_id';
            }
            else
            {
                $select_str = 'GROUP_CONCAT(CONCAT(t.first_name," ",t.last_name)) as therapist_name,GROUP_CONCAT(t.id) as therapist_id,CONCAT(p.first_name," ",p.last_name) as patient_name,p.id as patient_id';
                $groupBy_str = 'daily_therapist_visit_transection.patient_id';
            }
            $patient_invoices =  array();
            if(!empty($patient_id) || !empty($therapist_id))
            {
                $patient_invoices = DailyTherapistVisitTransection::selectRaw($select_str)
                    ->leftjoin("therapists as t","t.id","=","daily_therapist_visit_transection.therapist_id")
                    ->leftjoin("patients as p","p.id","=","daily_therapist_visit_transection.patient_id")
                    ->leftjoin("patient_invoices as pi","pi.patient_id","=","daily_therapist_visit_transection.patient_id")
                    ->leftjoin("master_therapy_type as mt","mt.id","=","daily_therapist_visit_transection.therapy_id")
                   ->whereRaw('DATE_FORMAT(daily_therapist_visit_transection.treatment_date, "%m") = "'.$month.'" and DATE_FORMAT(daily_therapist_visit_transection.treatment_date, "%Y") = "'.$year.'"'.$patient_str.$therapist_str)
                    ->groupBy($groupBy_str)
                    ->get()->toArray();
            }*/
             $filter_data["sort_by"] = !empty($_GET['sort_column_name'])?$_GET['sort_column_name']:'';
            $filter_data["sort_type"] = !empty($_GET['sort_type'])?$_GET['sort_type']:'';
            $items = Cart::getCurrentUserBookingsSuperUser($filter_data["sort_by"],$filter_data["sort_type"]);
        return view('partials.booking.export.current_booking', [
            
            'items'=>$items
            
        ]);
    }
    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_TEXT,
            'B' => NumberFormat::FORMAT_NUMBER,
            'C' => NumberFormat::FORMAT_NUMBER,
            'H' => NumberFormat::FORMAT_NUMBER,
            'I' => NumberFormat::FORMAT_NUMBER,
            'J' => NumberFormat::FORMAT_NUMBER,
            
            
        ];
    }
}
?>