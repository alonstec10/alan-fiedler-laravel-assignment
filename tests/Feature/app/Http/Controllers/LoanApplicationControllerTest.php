<?php

namespace Tests\Feature\app\Http\Controllers;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Tests\TestCase;

class LoanApplicationControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * @test
     * @return void
     */
    public function is_gets_200_response(): void
    {
        $response = $this->get('api/application/1');
        $this->assertTrue($response->getStatusCode() == ResponseAlias::HTTP_OK);
    }

    /**
     * @test
     * @return void
     */
    public function is_data_200_and_body_has_data(): void
    {
        $response = $this->get('api/application/1');
        $this->assertTrue($response->getStatusCode() == ResponseAlias::HTTP_OK);
        $this->assertJson($response->getContent());
        $this->assertArrayHasKey('data', $response->json());
    }




}
