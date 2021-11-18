<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConference;
use App\Http\Requests\UpdateConference;
use App\Http\Resources\Conference as ConferenceResource;
use App\Models\Conference;
use Okami101\LaravelAdmin\Filters\SearchFilter;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ConferenceController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Conference::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ConferenceResource::collection(
            QueryBuilder::for(Conference::class)
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
     * @param  \App\Models\Conference  $conference
     * @return ConferenceResource
     */
    public function show(Conference $conference)
    {
        return new ConferenceResource($conference->load([]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return ConferenceResource
     */
    public function store(StoreConference $request)
    {
        $conference = Conference::create($request->all());

        return new ConferenceResource($conference);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Conference  $conference
     * @return ConferenceResource
     */
    public function update(UpdateConference $request, Conference $conference)
    {
        $conference->update($request->all());

        return new ConferenceResource($conference);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Conference  $conference
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Conference $conference)
    {
        $conference->delete();

        return response()->noContent();
    }
}
