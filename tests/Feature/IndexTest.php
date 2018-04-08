<?php

namespace Tests\Feature;

use Tests\TestCase;

class IndexTest extends TestCase
{
    /**
     * Tests that the index page renders.
     *
     * @return void
     */
    public function testWillRenderIndex()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Tests that an invalid route returns a 404.
     *
     * @return void
     */
    public function testInvalidRouteReturnsNotFound()
    {
        $response = $this->get('/asasdasdasd');

        $response->assertStatus(404);
    }
}
