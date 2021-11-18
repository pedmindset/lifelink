<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfile;
use App\Http\Requests\UpdateProfile;
use App\Http\Resources\Profile as ProfileResource;
use App\Models\Profile;
use Okami101\LaravelAdmin\Filters\SearchFilter;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Profile::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ProfileResource::collection(
            QueryBuilder::for(Profile::class)
                ->allowedFilters([
                    AllowedFilter::custom('q', new SearchFilter([])),
                    AllowedFilter::exact('id'),
                    AllowedFilter::partial('name'),
                ])
                ->allowedSorts(['name'])
                ->allowedIncludes([])
                ->exportOrPaginate()
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return ProfileResource
     */
    public function show(Profile $profile)
    {
        return new ProfileResource($profile->load([]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return ProfileResource
     */
    public function store(StoreProfile $request)
    {
        $profile = Profile::create($request->all());

        return new ProfileResource($profile);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return ProfileResource
     */
    public function update(UpdateProfile $request, Profile $profile)
    {
        $profile->update($request->all());

        return new ProfileResource($profile);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();

        return response()->noContent();
    }
}
