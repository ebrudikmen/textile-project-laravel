<?php

namespace App\Models;

use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Sale
 * @package App\Models
 * @mixin Eloquent
 * @property int id
 * @property int customer_id
 * @property int product_id
 * @property int quantity
 * @property float sold_price
 * @property bool cancel
 * @property Carbon order_date
 * @property Carbon payment_date
 * @property Carbon created_date
 * @property Carbon updated_date
 *
 */
class Sale extends Model
{

    protected $fillable = [
        'customer_id', 'product_id', 'quantity', 'sold_price', 'cancel', 'order_date', 'payment_date',
    ];
    protected $table = 'sale';

}
