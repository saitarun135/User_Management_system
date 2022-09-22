<?php

namespace App\Http\Controllers;

use App\Criteria\WhereCriteria;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    protected $repository;
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function register(UserRequest $request){
        $data = $request->all();
        $data['password'] = $this->binaryPassword($data['password']);
        $this->repository->register($data);
        return redirect('login');
    }

    public function login(UserRequest $request){
        $data = $request->all();
        $data['password'] = $this->binaryPassword($data['password']);
        $result = $this->repository->login($data);
        if(count($result) < 1){
           return  redirect()->back()->withErrors(['count'=>'Invalid credentials']);
        }
        return redirect('dashboard');
    }

    public function binaryPassword($pass){
        return $this->repository->model()::getPasswordAttribute($pass);
    }
}
