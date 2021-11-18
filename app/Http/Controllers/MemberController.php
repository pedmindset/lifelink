<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMember;
use App\Http\Requests\UpdateMember;
use App\Http\Resources\Member as MemberResource;
use App\Models\Member;
use Okami101\LaravelAdmin\Filters\SearchFilter;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Member::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return MemberResource::collection(
            QueryBuilder::for(Member::class)
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
     * @param  \App\Models\Member  $member
     * @return MemberResource
     */
    public function show(Member $member)
    {
        return new MemberResource($member->load([]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return MemberResource
     */
    public function store(StoreMember $request)
    {
        $member = Member::create($request->all());

        return new MemberResource($member);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return MemberResource
     */
    public function update(UpdateMember $request, Member $member)
    {
        $member->update($request->all());

        return new MemberResource($member);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Member $member)
    {
        $member->delete();

        return response()->noContent();
    }
}
