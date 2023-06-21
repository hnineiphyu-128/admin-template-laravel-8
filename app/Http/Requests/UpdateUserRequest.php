<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_edit');
    }

    public function rules()
    {
        return [
            'name'  => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255', 'unique:users,phone,' . request()->route('user')->id],
        ];
    }
}
