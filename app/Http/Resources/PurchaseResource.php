<?php

namespace App\Http\Resources;

use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


/**
 * Class PurchaseResource
 * @package App\Http\Resources
 * @mixin Purchase
 */
class PurchaseResource extends JsonResource
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
            'id'=>$this->id,
            'supplier_id'=>$this->supplier_id,
            'product_id'=>$this->product_id,
            'quantity'=>$this->quantity,
            'purchased_price'=>$this->purchased_price,
            'cancel'=>$this->cancel,
            'order_date'=>$this->order_date,
            'payment_date'=>$this->payment_date,

        ];
    }
}
