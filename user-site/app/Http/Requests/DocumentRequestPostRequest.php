<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Rules\FullWidthKanaRule;

class DocumentRequestPostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'kana' => ['required', new FullWidthKanaRule],
            'post_code' => 'required',
            'pref' => 'min:1',
            'city' => 'required',
            'address' => 'required',
            'email' => 'required|confirmed:email',
            'email_confirmation' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'pref.min' => '都道府県を入力してください',
        ];
    }
}
