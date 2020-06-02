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
            'image'=>'https://intern-pokedex.myriadapps.com/images/pokemon/'.$this->id.'.png',
            'types'=>$this->types()->select('name')->get(),
        ];
    }
}
