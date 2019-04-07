<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class DashboardControllerTest extends TestCase
{
    /**
     * /login page is visible
     *
     * @return void
     */
    public function test_no_user_should_return_login()
    {
        //when not logged in as a user, get /dashboard should return the user to the login page
        $response = $this->get('/dashboard');
        $response->assertRedirect('/login');
    }

    public function test_user_beheerder(){
        $user = new User([
            'role' => 'Beheerder'
        ]);
        $response = $this->actingAs($user)->get('/dashboard');
        $response->assertViewIs('dashPages.dashBeheerder');
        $user->delete();
    }

    public function test_user_bewoner(){
        $user = new User([
            'role' => 'Bewoner'
        ]);
        $response = $this->actingAs($user)->get('/dashboard');
        $response->assertViewIs('dashPages.dashBewoner');
        $user->delete();
    }

    public function test_user_vrijwilliger(){
        $user = new User([
            'role' => 'Vrijwilliger'
        ]);
        $response = $this->actingAs($user)->get('/dashboard');
        $response->assertViewIs('dashPages.dashVrijwilliger');
        $user->delete();
    }

    public function test_user_ouder(){
        $user = new User([
            'role' => 'Ouder'
        ]);
        $response = $this->actingAs($user)->get('/dashboard');
        $response->assertViewIs('dashPages.dashOuder');
        $user->delete();
    }
}
