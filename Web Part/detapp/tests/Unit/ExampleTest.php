<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Faker\Generator as faker;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
        //$this->visit('/')->see('Document Eye Tracker');
    }

    // Testing Basics routes of the application
    public function testPageRoutes(){

        // Checking wether the app loads the homepage correctly
        $homepage = $this->get('/');
        $homepage->assertStatus(200);

        // Checking wether the app loads the uploaded docments page correctly
        $documents = $this->get('/documents');
        $documents->assertStatus(200);

        // Checking wether the app loads the uploaded docments page correctly
        $documents = $this->get('/about');
        $documents->assertStatus(200);
    }

    // Checking Login/Register routes
    public function testLoginRegisterRoutes(){
        
        // Checking wether the app loads the login page correctly
        $login = $this->get('/login');
        $login->assertStatus(200);

        // Checking wether the app loads the register page correctly
        $register = $this->get('/register');
        $register->assertStatus(200);
    }

    // Check wether homepage loads correctly with navbar/options
    public function testHomePage(){
        $homepage = $this->get('/');
        $homepage->assertSeeText('Document Eye Tracker');
    }

    // Check if app redirects to login page if trying to access dashboard
    public function testRedirectLogin(){
        $response = $this->get('/dashboard');
        $response->assertRedirect('/login');
    }

    public function testAppSuccessfulLoad(){
        $navbar = $this->get('/');
        $navbar->assertSeeInOrder(['Home', 'Documents', 'Help', 'About']);
    }

    public function testRegistration()
    {
        $email = $this->faker->email;

        $response = $this->sendAjax('post', '/auth/register', [
            'email' => $email,
            'password' => $this->faker->password
        ]);

        $this->assertEquals($email, auth()->user()->email);
    }
    
}
