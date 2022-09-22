<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class WhereCriteria.
 *
 * @package namespace App\Criteria;
 */
class WhereCriteria implements CriteriaInterface
{
    protected $column;
    protected $value;
    public function __construct($column,$value)
    {
        $this->column = $column;
        $this->value = $value;
    }
    /**
     * Apply criteria in query repository
     *
     * @param string              $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        return $model->where($this->column,$this->value);
    }
}
