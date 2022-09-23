<?php

namespace App\Http\Controllers;

use App\Http\Requests\Employeerequest;
use App\Models\Employee;
use App\Repositories\EmployeeRepository;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $repository;
    public function __construct(EmployeeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(Employeerequest $request){
        $this->repository->postEmployee($request->all(),$this->getLoggedInID());
        redirect('dashboard');
    }
}
