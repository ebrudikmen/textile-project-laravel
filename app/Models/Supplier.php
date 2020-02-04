<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Supplier
 * @package App\Models
 * @mixin Eloquent
 * @property int id
 * @property string name
 * @property string surname
 * @property string email
 * @property string phone
 */
class Supplier extends Model
{

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'email', 'phone',

    ];

    /**
     * @return BelongsToMany
     */
    public function product()
    {
        return $this->belongsToMany(Product::class, 'purchase');

    }
}
