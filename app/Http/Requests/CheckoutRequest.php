<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends Request
{
    public function rules()
    {
        return [
            'email'          => ['required'],
        ];
    }
}
