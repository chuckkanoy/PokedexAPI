<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;


class RouteTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPokemon()
    {
        $response= $this->get('/');
        $response -> assertStatus(200);
    }
}
