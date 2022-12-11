<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;        
    }

    public function index()
    {
        $users = $this->userRepository->all();
        return view('Users.Index', compact('users'));
    }

    public function create()
    {
        return view('Users.Create');
    }

    public function store(UserStoreRequest $request)
    {
        $dataValidated = $request->validated();
        $dataValidated['password'] = Hash::make($dataValidated['password']);
        
        $this->userRepository->save(new User($dataValidated));
        return redirect()->route('users.index')->with('mensaje', 'Usuario guardado con exito.');
    }

    public function show(User $user)
    {
        return view('Users.Show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('Users.Edit', compact('user'));
    }

    public function update(User $user, UserUpdateRequest $request)
    {
        $dataValidated = $request->validated();
        if(isset($dataValidated['password'])){
            $dataValidated['password'] = Hash::make($dataValidated['password']);
        }

        $this->userRepository->save($user->fill($dataValidated));
        return redirect()->route('users.index')->with('mensaje', 'Usuario modificado con exito.');
    }

    public function destroy(User $user)
    {
        $this->userRepository->delete($user);
        return redirect()->route('users.index')->with('mensaje', 'Usuario borrado con exito.');
    }
}
