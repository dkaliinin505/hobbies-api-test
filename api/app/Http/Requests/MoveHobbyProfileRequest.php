<?php

namespace App\Http\Requests;

use App\Contracts\DTO;
use App\DataTransfers\MoveHobbyProfileDTO;
use Illuminate\Foundation\Http\FormRequest;

final class MoveHobbyProfileRequest extends BaseRequest
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
            'hobby_id' => 'required|numeric|exists:hobbies,id'
        ];
    }

    public function getDTO(): MoveHobbyProfileDTO
    {
        return new MoveHobbyProfileDTO(
            $this->input('hobby_id')
        );
    }
}
