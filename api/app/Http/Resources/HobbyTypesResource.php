<?php

namespace App\Http\Resources;

use App\Models\HobbyType;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin HobbyType */
final class HobbyTypesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
