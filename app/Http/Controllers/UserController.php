<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;        
    }

    public function index()
    {
        return $this->userRepository->all();
    }

    public function store(UserStoreRequest $request)
    {
        $dataValidated = $request->validated();
        $this->userRepository->save(new User($dataValidated));
        return "Ok";
    }

    public function show(User $user)
    {
        return $user;
    }

    public function update(User $user, UserUpdateRequest $request)
    {
        $dataValidated = $request->validated();
        $this->userRepository->save($user->fill($request->all()));
        return "Ok";
    }

    public function destroy(User $user)
    {
        $this->userRepository->delete($user);
        return "Ok";
    }
}
