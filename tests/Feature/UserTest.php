<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_users_resgistered_can_be_show()
    {
        $this->withoutExceptionHandling();

        $response = $this->get(route('users.index'));
        $users = User::factory(3)->create();

        $response->assertOk();
        $this->assertCount(3, $users);
    }

    public function test_new_user_can_be_created()
    {
        $this->withoutExceptionHandling();

        $response = $this->post(route('users.store'), [
            'name' => 'TestName',
            'email' => 'testname@email.com',
            'password' => Hash::make('password'),
        ]);

        $allUsers = User::all();
        $oneUser = $allUsers->last();
        $response->assertOk();
        
        $this->assertCount(1, $allUsers);
        $this->assertEquals('TestName', $oneUser->name);
        $this->assertEquals('testname@email.com', $oneUser->email);
    }

    public function test_user_can_be_updated()
    {
        $this->withoutExceptionHandling();

        User::factory(1)->create();

        $user = User::first();

        $response = $this->put(route('users.update', $user->id), [
            'name' => 'TestNameEdited',
            'email' => 'testnameEdited@email.com',
            'password' => Hash::make('passwordEdited'),
        ]);

        $response->assertOk();
        $user = $user->fresh();

        $this->assertEquals('TestNameEdited', $user->name);
        $this->assertEquals('testnameEdited@email.com', $user->email);
    }

    public function test_user_can_be_deleted()
    {
        $this->withoutExceptionHandling();

        User::factory(1)->create();
        $user = User::first();

        $response = $this->delete(route('users.destroy', $user->id));

        $users = User::all();
        $response->assertOk();
        
        $this->assertCount(0, $users);
    }
}
