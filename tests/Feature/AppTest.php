<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AppTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_homepage()
    {
        $response = $this->get('/');

        $response->assertViewHas('dataHubsData');
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_submission()
    {
        $this->withoutExceptionHandling();
        $email = 'hey@akomolafetosin.com';
        $symbol = 'GOOG';
        $startDate = '2023-06-01';
        $endDate = '2023-06-30';
        $companyName = 'Google';

        $response = $this->call('POST', '/', [
            'companySymbol' => $symbol,
            'email'         => $email,
            'startDate'     => $startDate,
            'endDate'       => $endDate,
        ]);

        $response->assertStatus(302);
    }
}
