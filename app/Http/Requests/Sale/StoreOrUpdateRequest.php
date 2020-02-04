<?php

namespace App\Http\Requests\Sale;

use App\Rules\PriceRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'customer_id' => 'required|int|exists:customers,id',
            'product_id' => 'required|int||exists:products,id',
            'quantity' => 'required|int',
            'sold_price' => ['required', new PriceRule],
            'cancel' => 'required|boolean',
            'order_date' => 'required|date',
            'payment_date' => 'required|date',
        ];
    }
}
