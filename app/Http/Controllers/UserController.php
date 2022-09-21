<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    protected $repository;
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function register(UserRequest $request){
        $data = $this->repository->create(['name'=>$request->name,
                                           'email'=>$request->email,
                                          'password' => md5($request->password)
                                        ]);
        dd($data);
    }
}
