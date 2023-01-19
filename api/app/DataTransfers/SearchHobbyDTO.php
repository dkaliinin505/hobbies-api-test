<?php

namespace App\DataTransfers;

use App\Contracts\DTO;

final class SearchHobbyDTO implements DTO
{
    public readonly string $name;

    public function __construct(
        $name,
    ) {
        $this->name = $name;
    }
}
