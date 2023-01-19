<?php

namespace App\DataTransfers;

use App\Contracts\DTO;

final class MoveHobbyProfileDTO implements DTO
{
    public readonly string $hobby_id;

    public function __construct(
        $hobby_id,
    ) {
        $this->hobby_id = $hobby_id;
    }
}
