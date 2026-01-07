<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

   public function rules(): array
    {
    return [
        'last_name'   => ['required'],
        'first_name'  => ['required'],

        'gender'      => ['required', 'in:1,2,3'],

        'email'       => ['required', 'email'],

        'tel1'        => ['required', 'string', 'max:5', 'regex:/^[0-9]+$/'],
        'tel2'        => ['required', 'string', 'max:5', 'regex:/^[0-9]+$/'],
        'tel3'        => ['required', 'string', 'max:5', 'regex:/^[0-9]+$/'],

        'address'     => ['required'],
        'building'    => ['nullable'],

        'category_id' => ['required'],

        'detail'      => ['required', 'max:120'],
    ];
    }

    public function attributes(): array
    {
        return [];
    }

    public function messages(): array
    {
        return [

            'last_name.required'  => '姓を入力してください',
            'first_name.required' => '名を入力してください',

            
            'gender.required'     => '性別を選択してください',

        
            'email.required'      => 'メールアドレスを入力してください',
            'email.email'         => 'メールアドレスはメール形式で入力してください',

            'tel1.required'       => '電話番号を入力してください',
            'tel2.required'       => '電話番号を入力してください',
            'tel3.required'       => '電話番号を入力してください',

            'tel1.regex'          => '電話番号は 半角英数字で入力してください',
            'tel2.regex'          => '電話番号は 半角英数字で入力してください',
            'tel3.regex'          => '電話番号は 半角英数字で入力してください',

           
            'tel1.max'            => '電話番号は 5桁まで数字で入力してください',
            'tel2.max'            => '電話番号は 5桁まで数字で入力してください',
            'tel3.max'            => '電話番号は 5桁まで数字で入力してください',

            'address.required'    => '住所を入力してください',

            'category_id.required'=> 'お問い合わせの種類を選択してください',

            'detail.required'     => 'お問い合わせ内容を入力してください',
            'detail.max'          => 'お問い合わせ内容は120文字以内で入力してください',
        ];
    }
}
