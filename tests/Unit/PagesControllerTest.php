<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PagesControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_view_index_page_is_returned(){
        $response = $this->get('/');

        $response->assertSuccessful();
        $response->assertViewIs('pages.index');
    }

    public function test_view_cmsHome_is_returned(){
        $response = $this->get('/cmsHome');

        $response->assertSuccessful();
        $response->assertViewIs('dashPages.cmsHome');
    }
}
