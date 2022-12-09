<?php

namespace Tests\Unit;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Mockery;
use Tests\TestCase;

class UserRepositoryTest extends TestCase
{

    use RefreshDatabase;

    public function test_all_method()
    {
        $this->withoutExceptionHandling();

        $userRepository = new UserRepository(new User);
        User::factory(3)->create();
        $users = $userRepository->all();

        $this->assertCount(3, $users);
    }

    public function test_save_method()
    {
        $this->withoutExceptionHandling();

        $userRepository = new UserRepository(new User);
        $userRepository->save(new User([
            'name' => 'TestName',
            'email' => 'testname@email.com',
            'password' => Hash::make('password'),
        ]));

        $users = $userRepository->all();

        $this->assertCount(1, $users);
    }

    public function test_delete_method()
    {
        $this->withoutExceptionHandling();

        $userRepository = new UserRepository(new User);
        User::factory(1)->create();
        $user = User::first();
        $userRepository->delete($user);

        $this->assertCount(0, $userRepository->all());
    }
}
