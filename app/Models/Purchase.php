<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Eloquent;
/**
 * Class Purchase
 * @package App\Models
 * @mixin Eloquent
 * @property int id
 * @property int supplier_id
 * @property int product_id
 * @property int quantity
 * @property float purchased_price
 * @property bool cancel
 * @property Carbon order_date
 * @property Carbon payment_date
 */
class Purchase extends Model
{
    protected $table = 'purchase';

    protected $fillable=[
        'supplier_id','product_id','quantity','purchased_price','cancel','order_date','payment_date'
    ];


    protected $dates =[
        'order_date','payment_date',
    ];
}
