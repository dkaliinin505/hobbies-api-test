<?php

namespace App\Contracts;

use App\DataTransfers\MoveHobbyProfileDTO;
use App\DataTransfers\SearchHobbyDTO;
use App\DataTransfers\StoreHobbyDTO;
use App\DataTransfers\UpdateHobbyDTO;
use App\Models\Hobby;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ProfileContract
{
    public function getAllHobbiesForUser(User $user, int $paginateNum = 25): LengthAwarePaginator;
    public function findUserHobby(User $user, int $hobbyId): ?Hobby;
    public function storeHobbyForUser(User $user, MoveHobbyProfileDTO $moveHobbyProfileDTO): bool;
    public function deleteHobbyForUser(User $user, MoveHobbyProfileDTO $moveHobbyProfileDTO): bool;
}
