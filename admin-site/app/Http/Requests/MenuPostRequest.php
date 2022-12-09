<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuPostRequest extends FormRequest
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

    public function validationData()
    {
        $data =  $this->request->all();

        // 改行を削除
        if (isset($data['description'])) {
            $data['description'] = preg_replace("/\n|\r|\r\n/", "", $data['description']);
        }
        if (isset($data['remarks'])) {
            $data['remarks'] = preg_replace("/\n|\r|\r\n/", "", $data['remarks']);
        }

        return $data;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:30',
            'description' => 'nullable|between:20,1000|string',
            'remarks' =>'nullable|between:20,1000|string',
            'turn' =>'nullable|between:1,999999999999999999|numeric',
            'detail.*.turn' =>'nullable|between:1,255|numeric',
            'detail.*.name' =>'required|max:30',
            'detail.*.price' =>'required|max:30',
        ];
    }

    public function messages()
    {
        $msg = [];
        $data = $this->request->all();
        foreach ($data['detail'] as $key => $val) {
            $msg += [
                'detail.' . $key . '.turn.between' => [
                    'numeric' => 'メニュー詳細 ' . $key + 1 . '行目：:attributeは:min～:maxの数値を入力してください',
                ],
                'detail.' . $key . '.name.required' => 'メニュー詳細 ' . $key + 1 . '行目：:attributeを入力してください',
                'detail.' . $key . '.name.max' => 'メニュー詳細 ' . $key + 1 . '行目：:attributeは:max字以内で入力してください',
                'detail.' . $key . '.price.required' => 'メニュー詳細 ' . $key + 1 . '行目：:attributeを入力してください',
                'detail.' . $key . '.price.max' => 'メニュー詳細 ' . $key + 1 . '行目：:attributeは:max字以内で入力してください',
            ];
        }
        return [
            'turn.between' => ':attributeは18桁以内かつ:min以上の数値を入力してください',
        ] + $msg;
    }

    public function attributes()
    {
        return [
            'name' => 'メニュー名',
            'detail.*.turn' => '表示順',
            'detail.*.name' => '名前',
            'detail.*.price' => '料金',
        ];
    }
}
