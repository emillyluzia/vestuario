<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RoupasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'tecido'=>'required',
        'tamanho'=>'required',
        'cor'=>'required',
        'categoria'=>'required',
        'fabricacao'=>'required',
        'estacao'=>'required',
        'descricao'=>'required'
        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
           'success'=>false,
           'error'=>$validator->errors()
        ]));
      }
      public function messages(){
       return [
        'tecido.required'=>'O campo nome é obrigatorio',
        'tamanho.required'=>'O campo nome é obrigatorio',
        'cor.required'=>'O campo nome é obrigatorio',
        'categoria.required'=>'O campo nome é obrigatorio',
        'fabricacao.required'=>'O campo nome é obrigatorio',
        'estacao.required'=>'O campo nome é obrigatorio',
        'descricao.required'=>'O campo nome é obrigatorio'

       ];
}
}