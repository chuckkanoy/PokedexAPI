<?php


namespace App\Http\Controllers;

use App\Pokemon;

class PokemonController
{
    public function index() {
        $pokemon = Pokemon::latest()->get();

        return view('pokemon.index', ['pokemon' => $pokemon]);
    }

    public function show($id) {

        //$pokemon = Pokemon::where('id', $id)->firstOrFail();
        $pokemon = Pokemon::find($id);

        return view('pokemon.show', ['pokemon' => $pokemon]);
    }

    public function create() {

    }

    public function store() {

    }

    public function edit() {

    }

    public function update() {

    }

    public function destroy() {

    }
}
