<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Faker\Generator as faker;
use App\User;
use Illuminate\Http\Response;

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

    // Check if the navbar include is successfully loaded
    public function testAppSuccessfulLoad(){
        $navbar = $this->get('/');
        $navbar->assertSeeInOrder(['Home', 'Documents', 'Help', 'About']);
    }

    /*
    // Testing wether a fake email address can register via the registration page
    public function testRegistration()
    {
        $email = $this->faker->email;

        $response = $this->sendAjax('post', '/auth/register', [
            'email' => $email,
            'password' => $this->faker->password
        ]);

        $this->assertEquals($email, auth()->user()->email);
    }
    */

    /*
    public function testUserAuthentication(){
        $user = new App\User;

    }
    */
    /*
    public function test_i_can_create_an_account()
    {
        $this->get('/register')
            ->type('Me', 'name')
            ->type('someone@outlook.com', 'email')
            ->type('secret', 'password')
            ->type('secret', 'password_confirmation')
            ->press('Register')
            ->see('register')
            ->seeInDatabase('users', ['email' => 'someone@outlook.com']);
    }

    */
    /*
    public function testApplication(){
        $user = factory(App\User::class)->create();

        
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('/')
            ->see('Hello, '.$user->name);
        
    }
    */

    // Testing wether certain users exist in database/already registered
    public function testUsersRegistered(){
        // Make call to application...
        $this->assertDatabaseHas('users', [
            'email' => 'dipanzan@live.com',
            'email' => 'niyaz@gmail.com',
            'email' => 'abir@gmail.com'
        ]);
    }

    // Testing wether users with not registered emails
    public function testUsersNotYetRegistered(){
        $this->assertDatabaseMissing('users', [
            'email' => 'example@example.com',
            'email' => 'dipanzan1@live.com'
        ]);
    }
}
