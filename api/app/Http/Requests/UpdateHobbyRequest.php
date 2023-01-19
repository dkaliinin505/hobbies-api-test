<?php

namespace App\Http\Requests;

use App\Contracts\DTO;
use App\DataTransfers\UpdateHobbyDTO;
use Illuminate\Foundation\Http\FormRequest;

final class UpdateHobbyRequest extends BaseRequest
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
            'name'    => 'required|string',
            'type_id' => 'required|numeric|exists:hobby_types,id'
        ];
    }

    public function getDTO(): UpdateHobbyDTO
    {
        return new UpdateHobbyDTO(
            $this->input('name'),
            $this->input('type_id')
        );
    }
}
