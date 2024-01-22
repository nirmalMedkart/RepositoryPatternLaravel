<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
class BaseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        $response = null;
        if($this->wantsJson() || $validator->errors()->all())
        {
            $response = response()->json([
                "code"  =>  400,
                "type"  =>  "Bad Request",
                "message"   =>  "Validation Error",
                'errors' => $validator->errors()
            ],400);
        }
        
        throw (new ValidationException($validator, $response))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }
}