<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrubRequest extends FormRequest
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
        $rule = [];
        $controller = $this->route()->getController();
        if(method_exists($controller, 'getRules'))
            $rule = $controller->getRules($this->method(),$this->route()->id ?? 0);
        return $rule;

    }

    public function messages()
    {
        return [
            'name.required' => 'Trường này không được bỏ trống !',
            'code.required' => 'Trường này không được bỏ trống !',
            'code.unique' => 'Trường này đã tồn tại trong hệ thống !',

            'value.required' => 'Trường này không được bỏ trống !',

            'detail.required' => 'Trường này không được bỏ trống !',

            'type.required' => 'Trường này không được bỏ trống !',

            'status.required' => 'Trường này không được bỏ trống !',

            'dealine.required' => 'Trường này không được bỏ trống !',
            'dealine.date' => 'Trường này không đúng địng dạng !',
        ];
    }
}