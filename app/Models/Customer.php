<?php

namespace App\Models;

use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Customer
 * @package App\Models
 * @mixin Eloquent
 *
 * @property int id
 * @property string name
 * @property string surname
 * @property string phone
 * @property string email
 * @property Carbon created_at
 * @property Carbon updated_at
 *
 */
class Customer extends Model
{

    protected $fillable = [
        'name', 'surname', 'phone', 'email',
    ];


    public function product()
    {
        $this->belongsToMany(Product::class, 'sale');
    }

}
