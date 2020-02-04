<?php

namespace App\Models;

use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Product
 * @mixin Eloquent
 *
 * @property int id
 * @property string name
 * @property Carbon created_at
 * @property Carbon updated_at
 * @property float price
 */
class Product extends Model
{

    protected $fillable = [
        'name', 'price'
    ];

    /**
     * @return BelongsToMany
     */
    public function supplier()
    {
        return $this->belongsToMany(Supplier::class, 'purchase');

    }

    /**
     * @return BelongsToMany
     */
    public function customer()
    {
        return $this->belongsToMany(Customer::class, 'sale');

    }
}
