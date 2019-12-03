<?php
namespace  App\Repositories;

use GuzzleHttp\Client;

class Pokemons {

    protected $api;

    public function __construct()
    {
        $this->api =  new Client([
            'base_uri' => 'https://pokeapi.co/api/v2/pokedex/1/',
            'timeout'  => 5.0,
        ]);
    }

    public function all()
    {
        $response = $this->api->request('GET', '');
        return json_decode($response->getBody()->getContents(), true);
    }
}
