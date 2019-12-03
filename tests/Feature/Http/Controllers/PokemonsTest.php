<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PokemonsTest extends TestCase
{
    /**
     * @test
     */
    public function obtenerListapokemons()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
