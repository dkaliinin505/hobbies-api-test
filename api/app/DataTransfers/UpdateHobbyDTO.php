<?php

namespace App\DataTransfers;

use App\Contracts\DTO;

final class UpdateHobbyDTO implements DTO
{
    public readonly string $name;
    public readonly int $type_id;

    public function __construct(
        $name,
        $type_id,
    )
    {
        $this->name    = $name;
        $this->type_id = $type_id;
    }
}
