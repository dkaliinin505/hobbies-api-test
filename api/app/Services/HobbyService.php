<?php

namespace App\Services;

use App\Contracts\HobbyContract;
use App\DataTransfers\SearchHobbyDTO;
use App\DataTransfers\StoreHobbyDTO;
use App\DataTransfers\UpdateHobbyDTO;
use App\Models\Hobby;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class HobbyService implements HobbyContract
{

    /**
     * @param int $paginateNum
     * @return LengthAwarePaginator<Hobby>
     */
    public function getAllHobbies(int $paginateNum = 25): LengthAwarePaginator
    {
        return Hobby::with('type')->paginate($paginateNum);
    }

    /**
     * @param StoreHobbyDTO $storeHobbyDTO
     * @return Hobby
     */
    public function createHobby(StoreHobbyDTO $storeHobbyDTO) : Hobby
    {
        return Hobby::create([
            'name' => $storeHobbyDTO->name,
            'hobby_types_id' => $storeHobbyDTO->type_id,
        ]);
    }

    /**
     * @param Hobby $hobby
     * @param UpdateHobbyDTO $updateHobbyDTO
     * @return Hobby
     */
    public function updateHobby(Hobby $hobby, UpdateHobbyDTO $updateHobbyDTO): Hobby
    {
        $hobby->name = $updateHobbyDTO->name;
        $hobby->hobby_types_id = $updateHobbyDTO->type_id;
        $hobby->save();

        return $hobby;
    }

    /**
     * @param Hobby $hobby
     * @return bool
     */
    public function deleteHobby(Hobby $hobby): bool
    {
        $hobby->delete();
        return true;
    }

    /**
     * @param int $id
     * @return Hobby|null
     */
    public function findById(int $id): ?Hobby
    {
        return Hobby::with('type')->find($id);
    }

    /**
     * @param SearchHobbyDTO $searchHobbyDTO
     * @return Collection<Hobby>
     */
    public function searchHobbyByName(SearchHobbyDTO $searchHobbyDTO): Collection
    {
        return Hobby::with('type')
               ->where('name', 'like', '%' . $searchHobbyDTO->name . '%')
               ->get();
    }
}
