<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAwardAndCitation;
use App\Http\Requests\UpdateAwardAndCitation;
use App\Http\Resources\AwardAndCitation as AwardAndCitationResource;
use App\Models\AwardAndCitation;
use Okami101\LaravelAdmin\Filters\SearchFilter;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class AwardAndCitationController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(AwardAndCitation::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return AwardAndCitationResource::collection(
            QueryBuilder::for(AwardAndCitation::class)
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
     * @param  \App\Models\AwardAndCitation  $awardAndCitation
     * @return AwardAndCitationResource
     */
    public function show(AwardAndCitation $awardAndCitation)
    {
        return new AwardAndCitationResource($awardAndCitation->load([]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return AwardAndCitationResource
     */
    public function store(StoreAwardAndCitation $request)
    {
        $awardAndCitation = AwardAndCitation::create($request->all());

        return new AwardAndCitationResource($awardAndCitation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AwardAndCitation  $awardAndCitation
     * @return AwardAndCitationResource
     */
    public function update(UpdateAwardAndCitation $request, AwardAndCitation $awardAndCitation)
    {
        $awardAndCitation->update($request->all());

        return new AwardAndCitationResource($awardAndCitation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AwardAndCitation  $awardAndCitation
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(AwardAndCitation $awardAndCitation)
    {
        $awardAndCitation->delete();

        return response()->noContent();
    }
}
