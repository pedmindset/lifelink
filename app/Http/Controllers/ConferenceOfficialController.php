<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConferenceOfficial;
use App\Http\Requests\UpdateConferenceOfficial;
use App\Http\Resources\ConferenceOfficial as ConferenceOfficialResource;
use App\Models\ConferenceOfficial;
use Okami101\LaravelAdmin\Filters\SearchFilter;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ConferenceOfficialController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(ConferenceOfficial::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ConferenceOfficialResource::collection(
            QueryBuilder::for(ConferenceOfficial::class)
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
     * @param  \App\Models\ConferenceOfficial  $conferenceOfficial
     * @return ConferenceOfficialResource
     */
    public function show(ConferenceOfficial $conferenceOfficial)
    {
        return new ConferenceOfficialResource($conferenceOfficial->load([]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return ConferenceOfficialResource
     */
    public function store(StoreConferenceOfficial $request)
    {
        $conferenceOfficial = ConferenceOfficial::create($request->all());

        return new ConferenceOfficialResource($conferenceOfficial);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ConferenceOfficial  $conferenceOfficial
     * @return ConferenceOfficialResource
     */
    public function update(UpdateConferenceOfficial $request, ConferenceOfficial $conferenceOfficial)
    {
        $conferenceOfficial->update($request->all());

        return new ConferenceOfficialResource($conferenceOfficial);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConferenceOfficial  $conferenceOfficial
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(ConferenceOfficial $conferenceOfficial)
    {
        $conferenceOfficial->delete();

        return response()->noContent();
    }
}
