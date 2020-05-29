<?php

namespace App\Repositories;

use App\Repositories\Interfaces\TypeRepositoryInterface;
use App\Type;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TypeRepository implements TypeRepositoryInterface {

    /**
     * return pokemon associated with type
     *
     * @param $type
     * @return AnonymousResourceCollection
     */
    public function show($type) {
        //grabs pokemon even by partial strings
        $type = Type::where('name', 'LIKE', '%'.$type.'%')->firstOrFail();
        return $type->pokemon()->paginate(10);
    }
}
