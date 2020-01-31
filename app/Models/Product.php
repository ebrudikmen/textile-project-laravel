<?php /** @noinspection PhpMissingFieldTypeInspection */
/** @noinspection SpellCheckingInspection */
/** @noinspection PhpUndefinedClassInspection */

/** @noinspection PhpUnused */

namespace App\Models;

use Eloquent;


use Carbon\Carbon;

/**
 * Class Product
 * @mixin Eloquent
 *
 * @property int id
 * @property string name
 * @property float price
 * @property Carbon created_date
 * @property Carbon updated_date
 */
class Product extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name', 'price',

    ];



}
