<?php

namespace App\Http\Resources;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class CustomerResource
 * @package App\Http\Resources
 * @mixin Customer
 */
class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name'=>$this->name,
            'surname'=>$this->surname,
            'email'=>$this->email,
            'phone'=>$this->phone,
        ];
    }
}
