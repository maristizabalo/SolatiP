<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * @test
     */
    public function user_registered_can_login(): void
    { 
        // $this->withoutExceptionHandling();

        // teniendo
        $credentials = [
            'email' => 'pruebas', 
            'password' => 'prueba123'
        ];

        // haciendo
        $response = $this->post('/api/auth/login/', $credentials);

        // dd($response->dump());
        
        // entonces
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => ['access_token']
        ]);
    }

    /**
     * @test
     */
    public function user_unregistered_cannot_login(): void
    {
        // teniendo
        $credentials = [
            'username' => 'maicol', 
            'password' => 'wrongpassword'
        ];

        // haciendo
        $response = $this->post('/api/auth/login', $credentials);
        
        // entonces
        $response->assertStatus(401);
    }

    /**
     * @test
     */
    public function username_required(): void
    {
        // teniendo
        $credentials = [
            'password' => 'prueba123'
        ];

        // haciendo
        $response = $this->post('/api/auth/login', $credentials);
        
        // entonces
        $response->assertStatus(422);
        $response->assertJsonStructure([
            'errors' => ['username']
        ]);
    }

    /**
     * @test
     */
    public function password_required(): void
    {
        // teniendo
        $credentials = [
            'username' => 'maicol'
        ];

        // haciendo
        $response = $this->post('/api/auth/login', $credentials);
        
        // entonces
        $response->assertStatus(401);
    }
}
