<?php

namespace App\Http\Requests\Sale;

use Illuminate\Foundation\Http\FormRequest;

class SaleFormRequest extends FormRequest
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
            'client_id'  => 'required',
            'product_id' => 'required',
            'amount'     => 'required',
            'value'      => 'required',
            'total'      => 'required',
            'sale_total' => 'required',
       
        ];
    }

     /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'client_id.required'  => 'o nome do cliente precisa ser informado.',
            'product_id.required' => 'o nome do produto precisa ser informado.',
            'amount.required'     => 'a quantidade do produto precisa ser informado.',
            'value.required'      => 'o valor do produto precisa ser informado.',
            'total.required'      => 'o total de cada do produto precisa ser informado.',
            'sale_total.required' => 'o total geral dos produtos precisa ser informado.',
             
        ];
    }
}
