<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;

class DashboardControllerTest extends TestCase
{
    /**
     * /login page is visible
     *
     * @return void
     */
    public function test_user_can_view_a_login_form()
    {
        $response = $this->get('/login');
        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }
}
