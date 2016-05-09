<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BuRequest extends Request
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
            'bu_name'=>'required|max:200',
            'bu_price'=>'required|max:20',
            'bu_rent'=>'required|integer',
            'bu_square'=>'required|min:2|max:200',
            'bu_type'=>'required|integer', 
            'bu_small_dis'=>'required|max:160',
            'bu_meta'=>'required|max:100',
            'bu_longitude'=>'required|max:200', 
            'bu_latitude'=>'required|max:200',
            'bu_large_dis'=>'required',
            'bu_status'=>'required|integer',
            'bu_rooms'=>'required|min:1|max:3',
            'bu_place'=>'required',
            'file'=>'mimes:jpg,jpeg,png|max:300'
        ];
    }
}
