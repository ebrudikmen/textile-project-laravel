<?php

namespace App\Models;


use App\Events\Purchased;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Eloquent;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
 *
 * @property Product product
 * @property Supplier supplier
 */
class Purchase extends Model
{
    protected $table = 'purchase';


    protected $fillable = [
        'supplier_id', 'product_id', 'quantity', 'purchased_price', 'cancel', 'order_date', 'payment_date'
    ];


    protected $dates = [
        'order_date', 'payment_date',
    ];
    protected $dispatchesEvents = [
        'created' => Purchased::class,
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
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

}
