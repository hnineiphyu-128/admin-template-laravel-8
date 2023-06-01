<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Gate;

class StoreReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('reservation_create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'first_name' => [
                'string',
                'required',
            ],
            'last_name' => [
                'string',
                'required',
            ],
            'address' => [
                'string',
                'required',
            ],
            'zip_code' => [
                'string',
                'required',
            ],
            'city' => [
                'string',
                'required',
            ],
            'state' => [
                'string',
                'required',
            ],
            'email' => [
                'string',
                'required',
                'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/',
            ],
            'phone' => [
                'string',
                'required',
                'regex:/^([0-9\s\-\+\(\)]*)$/'
            ],
            'check_in_date' => [
                'string',
                'required',
            ],
            'check_out_date' => [
                'string',
                'required',
            ],
        ];
    }
}
