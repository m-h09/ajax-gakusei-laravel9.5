<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResultRequest extends FormRequest
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
    $subjectRules = 'required|in:1,2,3,4,5'; // 教科のバリデーションルール

    return [
        
        'grade' => 'required|in:1,2,3,4', 
        'term' => 'required|in:1,2,3,4',
        'japanese'   => $subjectRules,
        'math'       => $subjectRules,
        'science'    => $subjectRules,
        'social_studies' => $subjectRules,
        'music'           => $subjectRules,
        'home_economics'  => $subjectRules,
        'english'         => $subjectRules,
        'art'             => $subjectRules,
        'health_and_physical_education' => $subjectRules
    ];
}
    public function attributes()
    {
        return [
            
            'grade' =>'学年',
            'term' => '学期',
            'japanese' =>'国語',
            'math' =>'数学',
            'science' =>'理科',
            'social_studies' =>'社会',
            'music' =>'音楽',
            'home_economics' =>'家庭科',
            'english' =>'英語',
            'art' =>'美術',
            'health_and_physical_education' =>'保健体育'

        ];
    }
    public function messages(){

       
        $subject = [
            'japanese' =>'国語',
            'math' =>'数学',
            'science' =>'理科',
            'social_studies' =>'社会',
            'music' =>'音楽',
            'home_economics' =>'家庭科',
            'english' =>'英語',
            'art' =>'美術',
            'health_and_physical_education' =>'保健体育'
        ];
        $messages =[
            'grade.required' => '学年は必須項目です',
            'grade.in' => '学年は1年、2年、3年、4年のいずれかで選択してください',
            'term.required' =>'学期は必須項目です',
            'term.in' =>'学期は1学期、2学期、3学期、4学期のいずれかで選択してください',

        ];
        foreach($subject as $key =>$subject){

            $messages[$key . '.required'] = $subject .'の成績は必須です';
            $messages[$key . '.in'] =$subject . 'の成績は１、２、３、４、５のいずれかです';
        }
        return $messages;




    }
}
