<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequisicaoItemRequest extends FormRequest
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
            'qtd_solicitada' => 'riquired',
            'qtd_recebida' => 'riquired',
            'qtd_devolvida' => 'riquired',
            'data_recebimento' => 'riquired',
            'data_devolucao' => 'riquired',
            'material_id' => 'riquired',
            'user_id' => 'riquired',
            'requisicao_id' => 'riquired'
             
        ];
    }
}
