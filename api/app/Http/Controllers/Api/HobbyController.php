<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Response;
use App\Contracts\HobbyContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchHobbyRequest;
use App\Http\Requests\StoreHobbyRequest;
use App\Http\Requests\UpdateHobbyRequest;
use App\Http\Resources\HobbyResource;
use App\Http\Response\ApiResponse;

final class HobbyController extends Controller
{
    public function __construct(
        private readonly HobbyContract $hobbyService
    ) {}
    /**
     * Display a listing of the resource.
     *
     * @return ApiResponse
     */
    public function index(): ApiResponse
    {
        $hobbies = $this->hobbyService->getAllHobbies();

        return new ApiResponse(HobbyResource::collection($hobbies));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreHobbyRequest  $request
     * @return ApiResponse
     */
    public function store(StoreHobbyRequest $request): ApiResponse
    {
        $hobby = $this->hobbyService->createHobby($request->getDTO());

        return new ApiResponse(HobbyResource::make($hobby));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return ApiResponse
     */
    public function show(int $id): ApiResponse
    {
        $hobby = $this->hobbyService->findById($id);

        if (is_null($hobby)) {
            return new ApiResponse('Hobby not found', Response::HTTP_NOT_FOUND, false);
        }

        return new ApiResponse(HobbyResource::make($hobby));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateHobbyRequest  $request
     * @param  int  $id
     * @return ApiResponse
     */
    public function update(UpdateHobbyRequest $request, int $id): ApiResponse
    {
        $hobby = $this->hobbyService->findById($id);

        if (is_null($hobby)) {
            return new ApiResponse('Hobby not found', Response::HTTP_NOT_FOUND, false);
        }

        $updatedHobby = $this->hobbyService->updateHobby($hobby, $request->getDTO());

        return new ApiResponse(HobbyResource::make($updatedHobby));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return ApiResponse
     */
    public function destroy(int $id): ApiResponse
    {
        $hobby = $this->hobbyService->findById($id);

        if (is_null($hobby)) {
            return new ApiResponse('Hobby not found', Response::HTTP_NOT_FOUND, false);
        }

        $hobby->delete();

        return new ApiResponse('Hobby successfully delete');
    }

    /**
     * Search specified resource .
     *
     * @param  SearchHobbyRequest  $request
     * @return ApiResponse
     */
    public function search(SearchHobbyRequest $request): ApiResponse
    {
        $hobbies = $this->hobbyService->searchHobbyByName($request->getDTO());

        return new ApiResponse(HobbyResource::collection($hobbies));
    }
}
