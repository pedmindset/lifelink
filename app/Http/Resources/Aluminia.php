<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Okami101\LaravelAdmin\Http\Resources\BaseResource;

class Aluminia extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
