<?php

namespace App\Repositories;

use App\Models\Employee;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\EmployeeRepositoryRepository;

use App\Validators\EmployeeRepositoryValidator;

/**
 * Class EmployeeRepositoryRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class EmployeeRepository extends BaseRepository implements EmployeeRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Employee::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function postEmployee(Array $attributes){
        $a = $this->session()->get('user');
        // $this->create([
        //     'name' => $attributes['name'],
        //     'email' => $attributes['email'],
        //     'joining_date' => $attributes['doj'],
        //     'manager_id' =>
        //     ])
    }

}
