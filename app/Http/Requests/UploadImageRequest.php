<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UploadImageRequest extends FormRequest
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


    public function rules()
    {
        $rule = [
            "image" => "required|mimes:png,jpg",
        ];
        $currentAction = $this->route()->getActionMethod();
        if($currentAction == "updateImageCourse") $rule = array_merge($rule , [
            "image_old" => "required"
        ]);
        return $rule;
    }

    public function messages()
    {
        return [
            "image.required" => "Trường này không được bỏ trống !",
            "image.mimes" => "Trường này phải thuộc dạng : JPG,PNG  !",
            "image_old.required" => "Trường này không được bỏ trống !",
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            "errors" => $validator->errors(),
            "status" => false,
        ]));
    }
}