<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompraItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'qtd'=>'required',
            'custo_unitario'=> 'required',
            'subtotal' => 'required',
            'material_id' => 'required',
            'user_id' => 'required',
            'compra_id' => 'required'

        ];
    }
}
