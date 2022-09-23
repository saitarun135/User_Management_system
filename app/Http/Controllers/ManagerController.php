<?php

namespace App\Http\Controllers;

use App\Criteria\WhereCriteria;
use App\Http\Requests\ManagerRequest;
use App\Repositories\EmployeeRepository;
use App\Repositories\ManagerRepository;
use Illuminate\Http\Request as HttpRequest;

class ManagerController extends Controller
{
    protected $repository;
    public function __construct(ManagerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function register(ManagerRequest $request)
    {
        $data = $request->all();
        $data['password'] = $this->binaryPassword($data['password']);
        $this->repository->register($data);
        return redirect('login');
    }

    public function login(ManagerRequest $request)
    {
        $data = $request->all();
        $data['password'] = $this->binaryPassword($data['password']);
        $result = $this->repository->login($data);
        if (count($result) < 1) {
            return redirect()->back()->withErrors(['count' => 'Invalid credentials']);
        }
        if (isset($result[0])) {
            $request->session()->put('user',[$result[0]]);
           // session(['user' => [$result[0]]]);
        }
        return redirect('dashboard');
    }

    // public function dashboard()
    // {
    //     $repo = new EmployeeRepository();
    //     $repo->pushCriteria(new WhereCriteria('manager_id',$this->getLoggedInID()));
    //     $repo->all();
    //     dd($repo);
    //     return view('dashboard');
    // }

    public function logout(HttpRequest $request)
    {

        $chk = $request->session()->pull('user');
        if (count($chk)>0) {
            return redirect('login');
        }
    }

    public function binaryPassword($pass)
    {
        return $this->repository->model()::getPasswordAttribute($pass);
    }
}
