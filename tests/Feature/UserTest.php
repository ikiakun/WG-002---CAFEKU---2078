<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_register(){
        $response = $this->post('/register',[
            'name' => 'qwqw',
            'email' => 'q@q.acc',
            'password' => '12345678',
            'password_confirmation' => '12345678',
            'role' => 'admin'
        ]);
        $response->assertRedirect('/home');
    }
}
