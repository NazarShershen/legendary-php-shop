<?php

namespace App\Http\Requests;

use App\Rules\Attributes;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CreateArtifactRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|min:5',
            'attributes' => [new Attributes],
            'modifiers' => 'required|string',
            'description' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    if(!Str::is('*.', $value)) {
                        $fail("The $attribute must have dot at the end.");
                    }
                },
            ],
            'price' => 'required|numeric|min:1',
            'image' => 'required|image|max:2000',
        ];
    }

    public function messages()
    {
        return [
            'price.min' => 'The :attribute should be at leased :min Schmeckle'
        ];
    }
}
