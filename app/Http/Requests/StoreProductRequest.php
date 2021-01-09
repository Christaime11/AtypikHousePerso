<?php

namespace App\Http\Requests;

use App\Models\Product;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_create');
    }

    public function rules()
    {
        return [
            'name'            => [
                'string',
                'required',
            ],
            'price'           => [
                'required',
            ],
            'categories.*'    => [
                'integer',
            ],
            'categories'      => [
                'required',
                'array',
            ],
            'adresse'         => [
                'string',
                'required',
            ],
            'nombre_lit'      => [
                'required',
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'has_tv'          => [
                'required',
            ],
            'has_chauffage'   => [
                'required',
            ],
            'has_climatiseur' => [
                'required',
            ],
            'has_internet'    => [
                'required',
            ],
            'photo.*'         => [
                'required',
            ],
        ];
    }
}
