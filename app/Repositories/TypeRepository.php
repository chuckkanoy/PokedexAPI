<?php

namespace App\Repositories;

use App\EggGroup;
use App\Repositories\Interfaces\AttributeRepositoryInterface;
use App\Type;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Config;

class TypeRepository implements AttributeRepositoryInterface {

    /**
     * return pokemon associated with type
     *
     * @param $type
     * @return AnonymousResourceCollection
     */
    public function show($type) {
        try {
            //grabs pokemon even by partial strings
            $type = Type::where('name', 'LIKE', '%'.$type.'%')->firstOrFail()->pokemon();
            return $type;
        } catch (ModelNotFoundException $mnfe) {
            throw $mnfe;
        }
    }

    /**
     * return list of all types
     *
     * @return mixed
     */
    public function index() {
        return Type::paginate(Config::get('constants.perpage'));
    }
}
