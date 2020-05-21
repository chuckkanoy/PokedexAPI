<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Pokemon extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'types'=>$this->types,
            'height'=>$this->height,
            'weight'=>$this->weight,
            'abilities'=>$this->abilities,
            'egg_groups'=>$this->egg_groups,
            'stats'=>$this->stats,
            'genus'=>$this->genus,
            'description'=>$this->description
        ];
    }
}
