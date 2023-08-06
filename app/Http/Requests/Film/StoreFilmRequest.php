<?php

namespace App\Http\Requests\Film;

use Illuminate\Foundation\Http\FormRequest;

class StoreFilmRequest extends FormRequest
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
            'name' => 'required|unique:Films,name',
            'description' => 'required',
            'release_date' => 'required|date|date_format:Y-m-d',
            'rating' => 'required|numeric|between:0,5',
            'ticket_price' => 'required|numeric',
            'genre_id' => 'required|distinct|array|exists:genres,id',
            // 'country' => 'required',
            'photo' => 'required|mimes:jpeg,jpg,png,gif|max:10240'
        ];
    }
}
