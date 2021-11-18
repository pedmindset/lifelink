<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnnouncement;
use App\Http\Requests\UpdateAnnouncement;
use App\Http\Resources\Announcement as AnnouncementResource;
use App\Models\Announcement;
use Okami101\LaravelAdmin\Filters\SearchFilter;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class AnnouncementController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Announcement::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return AnnouncementResource::collection(
            QueryBuilder::for(Announcement::class)
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
     * @param  \App\Models\Announcement  $announcement
     * @return AnnouncementResource
     */
    public function show(Announcement $announcement)
    {
        return new AnnouncementResource($announcement->load([]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return AnnouncementResource
     */
    public function store(StoreAnnouncement $request)
    {
        $announcement = Announcement::create($request->all());

        return new AnnouncementResource($announcement);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announcement  $announcement
     * @return AnnouncementResource
     */
    public function update(UpdateAnnouncement $request, Announcement $announcement)
    {
        $announcement->update($request->all());

        return new AnnouncementResource($announcement);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        return response()->noContent();
    }
}
