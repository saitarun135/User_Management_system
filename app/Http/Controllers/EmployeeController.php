<?php

namespace App\Http\Controllers;

use App\Http\Requests\Employeerequest;
use App\Repositories\EmployeeRepository;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    protected $repository;
    public function __construct(EmployeeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(Employeerequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $data['image'] = $name;
            $image->move($destinationPath, $name);
        }
        if (isset($data)) {
            $data['current_date'] = date(Carbon::now());
        }
        $this->repository->postEmployee($data, $this->getLoggedInID());
        return redirect('dashboard');
    }

    public function dashboard()
    {
        $employees = $this->repository->with('managers')->all();
        $employees->filter(function ($items) {
            $split_date = date('Y-m-d', strtotime($items['joining_date']));
            $date = explode('-', $split_date);
            if (count($date) == 3) {
                isset($items['date_of_leaving']) ? $todate = $items['date_of_leaving'] : $todate = Carbon::now();
                $joining_date = Carbon::create($date[0], $date[1], $date[2]);
                $experience = $joining_date->diff($todate);
                switch ($experience) {
                    case ($experience->format('%y') == 0):
                        $experience = $experience->format('%d Days');
                        break;
                    case ($experience->format('%m') == 0):
                        $experience = $experience->format('%d Days');
                        break;
                    default:
                        $experience = $experience->format('%y Year, %m Months and %d Days');
                        break;
                }
                $items['joining_date'] = $experience;
            }
        });
        return view('dashboard')->with('employees', $employees->toArray());
    }

    public function destroy(Employeerequest $request)
    {
       //dd($request->delete_id);
        $this->repository->delete($request->delete_id);
        return redirect('dashboard');
    }
}
