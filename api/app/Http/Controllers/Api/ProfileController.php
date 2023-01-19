<?php

namespace App\Http\Controllers\Api;

use App\Contracts\ProfileContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\MoveHobbyProfileRequest;
use App\Http\Resources\HobbyResource;
use App\Http\Response\ApiResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

final class ProfileController extends Controller
{
    public function __construct(private readonly ProfileContract $profileService) { }

    public function store(MoveHobbyProfileRequest $request): ApiResponse
    {
        $user = Auth::user();

        if(is_null($this->profileService->findUserHobby($user, $request->getDTO()->hobby_id))){
            return new ApiResponse('Hobby exist in user list', Response::HTTP_BAD_REQUEST, false);
        }

        $this->profileService->storeHobbyForUser($user, $request->getDTO());

        return new ApiResponse('Hobby has stored to user list');
    }

    public function delete(MoveHobbyProfileRequest $request): ApiResponse
    {
        $user = Auth::user();

        if($user->hobbies->where('id', $request->input('hobby_id'))->isEmpty()){
            return new ApiResponse('Hobby not exist in user list', Response::HTTP_BAD_REQUEST, false);
        }

        $this->profileService->deleteHobbyForUser($user, $request->getDTO());

        return new ApiResponse('Hobby has deleted from user list');
    }

    public function index(): ApiResponse
    {
        $user = Auth::user();

        $allHobbiesForUser = $this->profileService->getAllHobbiesForUser($user);

        return new ApiResponse(HobbyResource::collection($allHobbiesForUser));
    }
}
