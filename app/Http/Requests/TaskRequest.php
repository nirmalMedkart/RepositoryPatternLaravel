<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;


class TaskRequest extends BaseRequest
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
            "title"=> "required|min:3|max:10",
            "desc"=> "required|min:3|max:100",
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title is required!',
            'desc.required' => 'Description is required!',
            'title.min' => 'minimum length is 3.',
            'title.max' => 'maximum length is 10.',
            'desc.min' => 'minimum length is 3.',
            'desc.max' => 'maximum length is 100.',
        ];
    }
}
