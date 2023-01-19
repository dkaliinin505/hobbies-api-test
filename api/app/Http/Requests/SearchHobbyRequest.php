<?php

namespace App\Http\Requests;

use App\Contracts\DTO;
use App\DataTransfers\SearchHobbyDTO;
use Illuminate\Foundation\Http\FormRequest;

final class SearchHobbyRequest extends BaseRequest
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
            'name' => 'required|string'
        ];
    }

    public function getDTO(): SearchHobbyDTO
    {
        return new SearchHobbyDTO(
            $this->input('name')
        );
    }
}
