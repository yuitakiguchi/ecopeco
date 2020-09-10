<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FoodRequest extends FormRequest
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
            'name'           => 'required|max:25',
            'trading_time'   => 'required',
            'discount_price' => 'required|integer|digits_between:1,6',
            'price'          => 'required|integer|digits_between:1,6',
            'coupon'         => 'required|integer',
            'image'          => 'mimes:jpeg,jpg,png,gif|max:10240',
        ];

    }

    public function messages()
    {
        return [
            'name.required'                 => 'タイトルは必須です。',
	        'name.max'                      => 'タイトルは25文字以内で記入してください。',
            'trading_time.required'         => '取引時間は必須です。',
            'price.required'                => '定価は必須です。',
            'price.integer'                 => '定価は数字を入力してください',
            'price.digits_between'          =>'10万円以下で定価をご入力ください',
            'price.min'                     =>'割引価格以上の値段を定価にご入力ください',
            'discount_price.required'       => '割引き価格は必須です。',
            'discount_price.required'       => '割引き価格は数字を入力してください',
            'discount_price.digits_between' =>'10万円以下で割引価格をご入力ください',
            'coupon.required'               => 'クーポン枚数は必須です。',
            'image.mimes'                   => 'ファイルタイプをjpeg,jpg,png,gifに設定してください。',
            'image.max'                     => 'ファイルサイズを10MB以下に設定してください。',
    ];
}
}
