<?php

namespace App\Models;

use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * Class User
 * @mixin Eloquent
 * @property int id
 * @property string first_name
 * @property string last_name
 * @property string email
 * @property Carbon email_verified_at
 * @property string password
 * @property string phone
 * @property Carbon phone_verified_at
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class User extends Authenticatable implements JWTSubject
{
    /**
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'email_verified_at', 'password',
    ];


    /**
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    /**
     * @var array
     */
    protected $dates = [
        'email_verified_at',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();

    }

    /**
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * @param mixed $value
     * @return Model|null
     */
    public function resolveRouteBinding($value)
    {
        if ($value === 'me') {
            $value = auth()->id();
        }

        return parent::resolveRouteBinding($value);

    }

}
