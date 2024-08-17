<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SchoolRequest extends FormRequest
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
            'grade' => 'nullable|integer|in:1,2,3,4', // 数値として許可、integer
            'name' => 'required|string|max:255',
            'address'   => 'required|string|max:255',
            'img_path' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'comment'  => 'nullable|string|max:255'
        ];
    }

    public function attributes()
    {
        return [
            'name' => '氏名',
            'address' => '住所',
            'img_path' => '画像',
            'grade' =>'学年',
            'comment'=>'コメント'

        ];
    }
    public function messages(){
        return[
            //name
            'name.required' =>':attributeは必要項目です',
            'name.max'=>':attribute字以内で入力してください',

            //住所
            'address.required'         => ':attributeは必須項目です',
            'address.alpha_num'        => ':attributeで入力してください',
            'address.max'              => ':attributeは:max字以内で入力してください。',

            //画像
            
            'img_path.image' => "指定されたファイルが画像ではありません。",
            "img_path.mimes" => "指定された拡張子（PNG/JPG/GIF）ではありません。",
            
            'grade.in' => '学年は1年、2年、3年、4年のいずれかを選択してください'

        ];
    }

}
