<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubscription extends FormRequest
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
            'email' => 'required|email|unique:subscriptions,email',
        ];
    }

    /**
     * The validation messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'The e-mail field is required',
            'email.email'    => 'Please enter valid e-mail',
            'email.unique'   => 'The e-mail has already been subscribed',
        ];
    }
}
