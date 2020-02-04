<?php

namespace App\Http\Resources;

use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class SaleResource
 * @package App\Http\Resources
 * @mixin Sale
 */
class SaleResource extends JsonResource
{


    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'customer_id' => $this->customer_id,
            'product_id' => $this->product_id,
            'quantity' => $this->quantity,
            'sold_price' => $this->sold_price,
            'cancel' => $this->cancel,
            'order_date' => $this->order_date,
            'payment_date' => $this->payment_date,
        ];
    }
}
