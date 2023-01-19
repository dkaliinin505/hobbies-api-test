<?php

namespace App\Http\Resources;

use App\Models\Hobby;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Hobby */
final class HobbyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'type' => $this->type->name
        ];
    }
}
