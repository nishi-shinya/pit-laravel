<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_ユーザー登録画面を表示する。()
    {
        $response = $this->get('/user');
        $response->assertStatus(200);
    }

//    public function test_ユーザー情報を登録する。()
//    {
//        $response = $this->post('/user/register', [
//            'name' => 'テスト',
//            'email' => 'test@example.com',
//            'password' => 'password01'
//        ]);
//
//        $response->assertStatus(200);
//    }
}
