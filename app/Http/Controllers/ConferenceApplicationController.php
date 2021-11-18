<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConferenceApplication;
use App\Http\Requests\UpdateConferenceApplication;
use App\Http\Resources\ConferenceApplication as ConferenceApplicationResource;
use App\Models\ConferenceApplication;
use Okami101\LaravelAdmin\Filters\SearchFilter;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ConferenceApplicationController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(ConferenceApplication::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ConferenceApplicationResource::collection(
            QueryBuilder::for(ConferenceApplication::class)
                ->allowedFilters([
                    AllowedFilter::custom('q', new SearchFilter([])),
                    AllowedFilter::exact('id'),
                    
                ])
                ->allowedSorts([])
                ->allowedIncludes([])
                ->exportOrPaginate()
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ConferenceApplication  $conferenceApplication
     * @return ConferenceApplicationResource
     */
    public function show(ConferenceApplication $conferenceApplication)
    {
        return new ConferenceApplicationResource($conferenceApplication->load([]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return ConferenceApplicationResource
     */
    public function store(StoreConferenceApplication $request)
    {
        $conferenceApplication = ConferenceApplication::create($request->all());

        return new ConferenceApplicationResource($conferenceApplication);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ConferenceApplication  $conferenceApplication
     * @return ConferenceApplicationResource
     */
    public function update(UpdateConferenceApplication $request, ConferenceApplication $conferenceApplication)
    {
        $conferenceApplication->update($request->all());

        return new ConferenceApplicationResource($conferenceApplication);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConferenceApplication  $conferenceApplication
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(ConferenceApplication $conferenceApplication)
    {
        $conferenceApplication->delete();

        return response()->noContent();
    }
}
