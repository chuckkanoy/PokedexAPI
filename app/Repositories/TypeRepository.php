<?php

namespace App\Repositories;

use App\EggGroup;
use App\Repositories\Interfaces\AttributeRepositoryInterface;
use App\Type;
//use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TypeRepository implements AttributeRepositoryInterface {

    /**
     * return pokemon associated with type
     *
     * @param $type
     * @return AnonymousResourceCollection
     */
    public function show($type) {
        //grabs pokemon even by partial strings
        $type = Type::where('name', 'LIKE', '%'.$type.'%')->first();

        if($type == null) {
            return false;
        }

        return $type;
    }
}
