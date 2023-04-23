<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'user_id' => [
                'required',
                'string',
                'max:100',
            ],
            'name' => [
                'required',
                'string',
                'max:50',
            ],
            'mobile_number' => [
                'required',
                'string',
                'max:191',
            ],
            'additional_mobile_number' => [
                
                'string',
                'max:30',
            ],
            'dob' => [
                'required',
            ],
            'designation' => [
                'required',
                'string',
                'max:191',
            ],
            'nid' => [
                'required',
                'string',
                'max:191',
            ],
            'passport' => [
                'required',
                'string',
                'max:191',
            ],
            'nationality' => [
                'required',
                'string',
                'max:50',
            ],
            'gender' => [
                'required',
                'string',
                'max:10',
            ],
            'permanent_address' => [
                'required',
                'string',
                'max:191',
            ],
            'status' => [
                'required',
                'string',
                'max:191',
            ],
            'image_path' => [
                'string',
            ],

            'additional_info' => [
                'required',
                'string',
                'max:191',
            ],
        ];

        if($this->getMethod()=='POST')
        {
            $rules += [
                'email' => [
                'required',
                'email',
                'max:191',
                'unique:profiles,email',
                    
                ],
            ];
        }

        if($this->getMethod()=='PUT')
        {
            $profile = $this->route('profile');
            $rules += [
                'email' => [
                'required',
                'email',
                'max:191',
                Rule::unique('profiles')->ignore($profile->id),
                // Rule::unique('profiles')->ignore($this->profile),
                    
                ],
            ];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'user_id.required' => 'Please enter user_id',
            'name.required' => 'Please enter  fullname',
            'email.required' => 'Please enter  email id',
            'email.email' => 'Please enter valid email id',
            'mobile_number.required' => 'Please enter  phone no',
            'dob.required' => 'Please enter  Date of Birth',
            'nationality.required' => 'Please enter  nationality',
        ];
    }
}
