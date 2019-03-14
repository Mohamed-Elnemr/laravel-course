<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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

            'title' => 'required |min:3| unique:posts,title,'.$this->post->id,
            'description' => 'required | min:10',

        ];
    }

    public function messages()
    {
        return [
            'title.required' => ' Title is Required',
            'title.min' => ' Minimum 3 charatcters are required',
            'title.unique' => ' Title Must be unique',

            'description.min' => 'minimum 10 characters required',

            'description.required' => 'Description is required',
        ];
    }
}
