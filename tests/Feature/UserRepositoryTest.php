<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register()
    {
        $this->post('api/register', [
            'first_name' => 'Vasile',
            'last_name' => 'Papuc',
            'email' => 'som@some.com',
            'password' => 'secret!',
            'password_confirmation' => 'secret!'
        ])->assertCreated();

        $this->assertDatabaseHas('users', [
            'first_name' => 'Vasile',
            'last_name' => 'Papuc',
            'email' => 'som@some.com',
        ]);
    }

    public function test_user_can_login()
    {
        $this->post('api/register', [
            'first_name' => 'Vasile',
            'last_name' => 'Papuc',
            'email' => 'som@some.com',
            'password' => 'secret!',
            'password_confirmation' => 'secret!'
        ])->assertCreated();

        $this->assertDatabaseHas('users', [
            'first_name' => 'Vasile',
            'last_name' => 'Papuc',
            'email' => 'som@some.com',
        ]);

        $this->post('api/login', [
            'email' => 'som@some.com',
            'password' => 'secret!'
        ])->assertOk();
    }
}
