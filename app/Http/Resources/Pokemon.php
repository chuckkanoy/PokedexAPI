<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Pokemon extends JsonResource
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
        $data = [
            'id'=>$this->id,
            'name'=>$this->name,
            'types'=>$this->types()->select('name')->get(),
            'height'=>$this->height,
            'weight'=>$this->weight,
            'abilities'=>$this->abilities()->select('name')->get(),
            'egg_groups'=>$this->egg_groups()->select('name')->get(),
            'stats'=>$this->stats,
            'genus'=>$this->genus,
            'description'=>$this->description
        ];

        //paginate resource if necessary
        if(count($data) > $this->perPage){
            return [
                'data'=>$data,
                'pagination'=> [
                    'size' => $this->perPage,
                    'total' => $this->total,
                    'current' => $this->currentPage
                ]
            ];
        }
        return $data;
    }
}
