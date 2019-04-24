<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GebruikerBeherenTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_beheerder_can_view_users(){
        $user = new User([
            'role' => 'Beheerder'
        ]);

        $response = $this->actingAs($user)->get('/gebruikers');
        $response->assertViewIs('dashPages.dashGebruikers');
    }

    public function test_resident_cannot_view_users(){
        $user = new User([
            'role' => 'Bewoner'
        ]);

        $response = $this->actingAs($user)->get('/gebruikers');
        $response->assertRedirect();
    }
}
