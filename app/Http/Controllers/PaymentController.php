<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePayment;
use App\Http\Requests\UpdatePayment;
use App\Http\Resources\Payment as PaymentResource;
use App\Models\Payment;
use Okami101\LaravelAdmin\Filters\SearchFilter;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Payment::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return PaymentResource::collection(
            QueryBuilder::for(Payment::class)
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
     * @param  \App\Models\Payment  $payment
     * @return PaymentResource
     */
    public function show(Payment $payment)
    {
        return new PaymentResource($payment->load([]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return PaymentResource
     */
    public function store(StorePayment $request)
    {
        $payment = Payment::create($request->all());

        return new PaymentResource($payment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return PaymentResource
     */
    public function update(UpdatePayment $request, Payment $payment)
    {
        $payment->update($request->all());

        return new PaymentResource($payment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();

        return response()->noContent();
    }
}
