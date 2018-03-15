<?php

namespace app\Repositories\Eloquent;

use App\Models\Income;
use App\Repositories\Contracts\IncomeRepository;

class EloquentIncome implements IncomeRepository
{
    /**
     * @var $model
     */
    private $model;

    /**
     * EloquentCategory constructor.
     *
     * @param App\Income $model
     */
    public function __construct(Income $model)
    {
        $this->model = $model;
    }

    /**
     * Create a new Category.
     *
     * @param array $attributes
     *
     * @return App\Categorys
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * Delete a Category.
     *
     * @param integer $id
     *
     * @return boolean
     */
    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }

    public function all($columns = array('*'))
    {
        return $this->model->get($columns);
    }

    public function update(array $data, $id, $attribute = "id")
    {
        return $this->model->where($attribute, '=', $id)->update($data);
    }

    public function find($id, $columns = array('*'))
    {
        return $this->model->find($id, $columns);
    }

    public function findBy($attribute, $value, $columns = array('*'))
    {
        return $this->model->where($attribute, '=', $value)->first($columns);
    }

    public function paginate($perPage = 15, $columns = array('*'))
    {
        return $this->model->paginate($perPage, $columns);
    }
}
