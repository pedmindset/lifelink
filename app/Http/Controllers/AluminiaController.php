<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAluminia;
use App\Http\Requests\UpdateAluminia;
use App\Http\Resources\Aluminia as AluminiaResource;
use App\Models\Aluminia;
use Okami101\LaravelAdmin\Filters\SearchFilter;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class AluminiaController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Aluminia::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return AluminiaResource::collection(
            QueryBuilder::for(Aluminia::class)
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
     * @param  \App\Models\Aluminia  $aluminia
     * @return AluminiaResource
     */
    public function show(Aluminia $aluminia)
    {
        return new AluminiaResource($aluminia->load([]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return AluminiaResource
     */
    public function store(StoreAluminia $request)
    {
        $aluminia = Aluminia::create($request->all());

        return new AluminiaResource($aluminia);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aluminia  $aluminia
     * @return AluminiaResource
     */
    public function update(UpdateAluminia $request, Aluminia $aluminia)
    {
        $aluminia->update($request->all());

        return new AluminiaResource($aluminia);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aluminia  $aluminia
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Aluminia $aluminia)
    {
        $aluminia->delete();

        return response()->noContent();
    }
}
