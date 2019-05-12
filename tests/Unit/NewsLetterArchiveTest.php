<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NewsLetterArchiveTest extends TestCase
{

    public function test_redirect_expected_without_logging_in()
    {
        $response = $this->get('/dashboard/nieuwsbriefarchief');
        $response->assertRedirect('/login');
    }
}

//    public function test_can_acces_NewsLetterArchive_with_correct_permissions(){
//        $user = new User([
//            'role' => 'Beheerder'
//        ]);
//        $userAuth = Auth::user();
//
//        $userAuth = $userAuth->authorizations;
//
//
//        $response = $this->actingAs($user)->get('/dashboard/nieuwsbriefarchief');
//        $response->assertViewIs('dashPages.dashNieuwsbriefArchief');
//
//        $user->delete();
//    }