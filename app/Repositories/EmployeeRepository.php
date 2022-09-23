<?php

namespace App\Repositories;

use App\Models\Employee;
use App\Repositories\EmployeeRepositoryRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

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

    public function postEmployee(array $attributes, $mangerID)
    {
        // dd($attributes);
        $this->insert([
            'name' => $attributes['fname'],
            'email' => $attributes['email'],
            'joining_date' => $attributes['doj'],
            'manager_id' => $mangerID,
            'image_path' => isset($attributes['image']) ? $attributes['image'] : null,
            'date_of_leaving' => isset($attributes['dol']) ? $attributes['dol'] : null,
            'still_working' => isset($attributes['current_date']) ? $attributes['current_date'] : null,
        ]);
    }

}
