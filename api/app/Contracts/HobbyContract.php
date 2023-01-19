<?php

namespace App\Contracts;

use App\DataTransfers\SearchHobbyDTO;
use App\DataTransfers\StoreHobbyDTO;
use App\DataTransfers\UpdateHobbyDTO;
use App\Models\Hobby;

interface HobbyContract
{
    public function findById(int $id);
    public function getAllHobbies(int $paginateNum = 25);
    public function createHobby(StoreHobbyDTO $storeHobbyDTO);
    public function updateHobby(Hobby $hobby, UpdateHobbyDTO $updateHobbyDTO);
    public function deleteHobby(Hobby $hobby);
    public function searchHobbyByName(SearchHobbyDTO $searchHobbyDTO);
}
