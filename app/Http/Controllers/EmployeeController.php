<?php

namespace App\Http\Controllers;

use App\Http\Requests\Employeerequest;
use App\Models\Employee;
use App\Repositories\EmployeeRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $repository;
    public function __construct(EmployeeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(Employeerequest $request){
        $data = $request->all();
        if(isset($data))
        {
            $data['current_date']=date(Carbon::now());
        }
        $this->repository->postEmployee($data,$this->getLoggedInID());
        redirect('dashboard');
    }
}
