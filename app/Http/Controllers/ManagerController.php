<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManagerRequest;
use App\Repositories\ManagerRepository;

class ManagerController extends Controller
{
    protected $repository;
    public function __construct(ManagerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function register(ManagerRequest $request){
        $data = $request->all();
        $data['password'] = $this->binaryPassword($data['password']);
        $this->repository->register($data);
        return redirect('login');
    }

    public function login(ManagerRequest $request){
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
