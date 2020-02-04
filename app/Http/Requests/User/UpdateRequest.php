<?php
/** @noinspection PhpUnused */

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

use Gate;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|Max:255',
            'email_verified_at' => 'nullable|date',
        ];
    }
}
