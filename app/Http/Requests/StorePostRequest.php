<?php

namespace App\Http\Requests;

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
        $rules =  [
            'description'   => 'required|min:10',
            'user_id'       => 'required|exists:users,id',
           
        ];
        if ($this->getMethod() == 'POST') {
            //create
            $rules += ['title'    => 'required|min:3|unique:posts'];
        }else {
            //update
            $rules += ['title'    => 'required|min:3|unique:posts,title,'.$this->post->id];
        }

        return $rules;
    }
    public function messages() {
        return [
            'title.required'=>'Please enter a title',
            'title.min' => 'Title too short',
            'description.required' => 'Please enter a description',
            'description.min' => 'Description too short',
            'user_id.required' => 'Please select a post creator'
        ];
    }
}






