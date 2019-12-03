<?php

namespace App\Http\Controllers;

use App\Repositories\Pokemons;

class PokemonsController extends Controller
{
    protected $pokemons;

    public function __construct(Pokemons $pokemons)
    {
        $this->pokemons = $pokemons;
    }

    public function index()
    {
        $data = $this->pokemons->all();
        $pokemons = array_map(function ($item) {
            return $item = ['photo' => 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/' . $item['entry_number'] . '.png',
                'name' => $item['pokemon_species']['name']];
        }, $data['pokemon_entries']);

        return view('pokemons.index', compact('pokemons'));
    }
}
