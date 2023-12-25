<?php

namespace Fintech\Airtime\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InternationalTopUpResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
