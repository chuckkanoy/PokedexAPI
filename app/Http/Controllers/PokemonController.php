<?php


namespace App\Http\Controllers;


class PokemonController
{
    public function show($id) {
        $pokemon = \DB::table('pokemon')->where('id', $id)->first();

        //dd($pokemon);

        return view('pokemon', ['pokemon' => $pokemon]);
    }
}
