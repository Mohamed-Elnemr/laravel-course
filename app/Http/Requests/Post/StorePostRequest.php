<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
                'title'=>'required |min:3| unique:posts',
                'description'=>'required | min:10',
                'user_id'=>'exists:users,id'


        ];
    }
    public function messages()
    {
        return [
            'title.required'=>' Title is Required',
            'title.min'=>' Minimum 3 charatcters are required',
            'title.unique'=>' Title Must be unique',

            'description.min'=>'minimum 10 charactersrequired',

            'description.required'=>'Description is required',
            'user_id'=>'No valid User',

        ];
    }
}
