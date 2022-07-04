<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Place;
use Laravel\Nova\Fields\Country;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\DateTime;

class Profile extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var  string
     */
    public static $model = \App\Models\Profile::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var  string
     */
    public static $title = 'first_name';

    /**
     * The columns that should be searched.
     *
     * @var  array
     */
    public static $search = [
        'id', 'first_name', 'last_name', 'email', 'phone'
    ];

    /**
     * Get the displayable label of the resource.
     *
     * @return  string
     */
    public static function label()
    {
        return __('Profiles');
    }

    /**
    * Get the displayable singular label of the resource.
    *
    * @return  string
    */
    public static function singularLabel()
    {
        return __('Profile');
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  array
     */
    public function fields(Request $request)
    {
        return [
                                                ID::make( __('Id'),  'id')
->rules('required')
->sortable()
,
                                                                BelongsTo::make('User')

->rules('required')
->searchable()
->sortable()
,
                                                                Text::make( __('First Name'),  'first_name')
->rules('required')
->sortable()
,
                                                                Text::make( __('Last Name'),  'last_name')
->rules('required')
->sortable()
,
                                                                Text::make( __('Email'),  'email')
->rules('required')
->sortable()
,
                                                                Number::make( __('Phone'),  'phone')
->sortable()
,
                                                                Text::make( __('Address'),  'address')
->sortable()
,
                                                                Text::make( __('School'),  'school')
->sortable()
,
                                                                Text::make( __('Level'),  'level')
->sortable()
,
                                                                Text::make( __('Coarse'),  'coarse')
->sortable()
,
                                                                Place::make( __('City'),  'city')
->sortable()
->onlyCities()
	,
                                                                Country::make( __('Country'),  'country')
->sortable()
,
                                                                Country::make( __('Nationality'),  'nationality')
->sortable()
,
                                                                                            Select::make( __('Aluminia'),  'aluminia')
->rules('required')
->sortable()
->options([
    		    '0' => 'No',
	    	    '1' => 'Yes',
	    	])
,
                                                                                                                        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
