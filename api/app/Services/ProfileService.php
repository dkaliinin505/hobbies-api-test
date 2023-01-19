<?php

namespace App\Services;

use App\Models\Hobby;
use App\Contracts\ProfileContract;
use App\DataTransfers\MoveHobbyProfileDTO;
use App\Models\User;
use App\DataTransfers\LoginDTO;
use App\DataTransfers\RegisterDTO;
use App\Contracts\AuthContract;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class ProfileService implements ProfileContract
{
    public function getAllHobbiesForUser(User $user, int $paginateNum = 25): LengthAwarePaginator
    {
        return $user->hobbies()->paginate($paginateNum);
    }


    public function findUserHobby(User $user, int $hobbyId): ?Hobby
    {
        return $user->hobbies()->find($hobbyId);
    }

    public function storeHobbyForUser(User $user, MoveHobbyProfileDTO $moveHobbyProfileDTO): bool
    {
        $user->hobbies()->attach($moveHobbyProfileDTO->hobby_id);
        return true;
    }


    public function deleteHobbyForUser(User $user, MoveHobbyProfileDTO $moveHobbyProfileDTO): bool
    {
        $user->hobbies()->detach($moveHobbyProfileDTO->hobby_id);
        return true;
    }
}
