<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
class CartExperiencesExtraInvoices extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'cart_experiences_extra_invoices';

    /**
    * The database primary key value.
    *
    * @var string
    */
    public $timestamps = false;
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'cart_exp_id',
                  'xero_invoice_id',
                  'xero_amount',
                  'mark_as_paid',
                  'invoice_data',
                  'xero_invoice_data',
                  'sent_to_finance',
                  'created_by',
                  'updated_by',
                  'created_at',
                  'updated_at',
                  
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    
}
