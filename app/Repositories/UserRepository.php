<?php

namespace App\Repositories;

use App\Criteria\WhereCriteria;
use App\Entities\Test;
use App\Models\User;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class TestRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function register(Array $data)
    {
        $this->insert(['name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);
    }

    public function login(Array $data){
        $this->pushCriteria(new WhereCriteria('email',$data['email']));
        $this->pushCriteria(new WhereCriteria('password',$data['password']));
        $result = $this->get();
        return $result;
    }
}
