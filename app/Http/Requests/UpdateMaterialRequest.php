<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMaterialRequest extends FormRequest
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
            'codigo'            => 'required',
            'perecivel'         => 'required',
            'stock_min'         => 'required',
            'stock_actual'      => 'required',
            'categoria_id'      => 'required',
            'stock_disponivel'  => 'required'
        ];
    }
}
