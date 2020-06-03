<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PokemonDetails extends JsonResource
{

    /**
     * Transform the resource into an array to return as JSON.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //fill in return data
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'image'=>'https://intern-pokedex.myriadapps.com/images/pokemon/'.$this->id.'.png',
            'types'=>$this->types()->get()->pluck('name'),
            'height'=>$this->height,
            'weight'=>$this->weight,
            'abilities'=>$this->abilities()->get()->pluck('name'),
            'egg_groups'=>$this->egg_groups()->get()->pluck('name'),
            'stats'=>json_decode($this->stats),
            'genus'=>$this->genus,
            'description'=>$this->description
        ];
    }
}
