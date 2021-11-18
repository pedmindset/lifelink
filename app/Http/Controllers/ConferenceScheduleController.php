<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConferenceSchedule;
use App\Http\Requests\UpdateConferenceSchedule;
use App\Http\Resources\ConferenceSchedule as ConferenceScheduleResource;
use App\Models\ConferenceSchedule;
use Okami101\LaravelAdmin\Filters\SearchFilter;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ConferenceScheduleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(ConferenceSchedule::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ConferenceScheduleResource::collection(
            QueryBuilder::for(ConferenceSchedule::class)
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
     * @param  \App\Models\ConferenceSchedule  $conferenceSchedule
     * @return ConferenceScheduleResource
     */
    public function show(ConferenceSchedule $conferenceSchedule)
    {
        return new ConferenceScheduleResource($conferenceSchedule->load([]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return ConferenceScheduleResource
     */
    public function store(StoreConferenceSchedule $request)
    {
        $conferenceSchedule = ConferenceSchedule::create($request->all());

        return new ConferenceScheduleResource($conferenceSchedule);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ConferenceSchedule  $conferenceSchedule
     * @return ConferenceScheduleResource
     */
    public function update(UpdateConferenceSchedule $request, ConferenceSchedule $conferenceSchedule)
    {
        $conferenceSchedule->update($request->all());

        return new ConferenceScheduleResource($conferenceSchedule);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConferenceSchedule  $conferenceSchedule
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(ConferenceSchedule $conferenceSchedule)
    {
        $conferenceSchedule->delete();

        return response()->noContent();
    }
}
