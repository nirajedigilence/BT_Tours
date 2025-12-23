<?php
  
namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Exports\ClientCurrentBookingExport;
use App\Models\Cms\Cart;
use App\Models\Cms\CartExperience;
use DB;
class ClientCurrentBookingExportMultiple implements WithMultipleSheets
{
	protected $id;

	function __construct() {
           
           
     }
    public function sheets(): array
    {
    	
            $sheets = [];
          
          $clientlist = CartExperience::selectRaw('carts.user_id,users.name AS colobratorName')->with(['upscales', 'experiencesToExperiences','experienceImages','tourStatuses'])
                 ->leftjoin('carts as carts', 'cart_experiences.carts_id', '=', 'carts.id')
                 ->leftjoin('users as users', 'carts.user_id', '=', 'users.id')
                ->where('carts.finalized', '=', 1)
                ->where('cart_experiences.completed', '=', 0)
                ->where('carts.deleted_at', null)
                ->orderBy('carts.user_id','ASC')
                ->groupBy('carts.user_id')
                ->get();
                if(!empty($clientlist))
                {
                    foreach($clientlist as $row)
                    {
                        $sheets[] = new ClientCurrentBookingExport($row->user_id,$row->colobratorName);
                    }
                }
              
           
          
         
           return $sheets;
           
    }
    
}
?>