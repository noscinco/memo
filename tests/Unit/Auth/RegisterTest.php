<?php

namespace Tests\Unit\Auth;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Support\Facades\Hash;

use App\User;

class RegisterTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRegister()
    {
       
        $user=[
            'name'=>"Servidor Teste",
            'email' => "email@teste.com",
            'password' => "password",
            'cpf'=>"17841469004",
            'siape_code'=>"0123456",
            'sector_code'=>"1",
            'office_code'=>"1",
            'initials_code'=>"ST"
        ];
        $response = $this->post('register',$user);
        $response->assertStatus(302);
        $newUser = User::where('email','email@teste.com')->first();
        if($newUser==null)
            User::create([
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
            ]);
        $this->assertDatabaseHas('users', [
            'email' => 'email@teste.com'
        ]);
       
    }
}
