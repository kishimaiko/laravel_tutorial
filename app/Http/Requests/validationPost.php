<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validationPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     * 
     * 認証関係の判定を行う場合はここに処理を記述する。
　*特にない場合は常にtrueを返しておく。
　*/

public function authorize()
{
    return true;
}

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     * 記事のタイトルは最低3文字以上、30文字以内とする
     * 記事のタイトル、記事の内容は必須項目にする
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:posts|min:3|max:30',
            'content' => 'required'
        ];
    }
}
