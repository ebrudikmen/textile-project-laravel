<?php

namespace App\Models;

use App\Events\Sold;
use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
 *
 * @property Product product
 * @property Customer customer
 */
class Sale extends Model
{

    protected $fillable = [
        'customer_id', 'product_id', 'quantity', 'sold_price', 'cancel', 'order_date', 'payment_date',
    ];
    protected $table = 'sale';

    protected $dates = [
        'order_date', 'payment_date',
    ];

    protected $dispatchesEvents = [
        'created' => Sold::class,
    ];

    /**
     * @return BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @return BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }


}
