<?php

namespace app\Repositories\Eloquent;

use App\Models\Category;
use App\Models\Group;
use App\Repositories\Contracts\CategoryRepository;

class EloquentCategory implements CategoryRepository
{
    /**
     * @var $model
     */
    private $model;

    /**
     * EloquentCategory constructor.
     *
     * @param \App\Category $model
     */
    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    /**
     * Get all Categories.
     *
     * @param string $query
     * @param integer $group_id
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function search($query, $group_id)
    {
        return $this->model
                    ->where('name','like','%'.$query.'%')
                    ->where('group_id', $group_id)
                    ->get();
    }

    /**
     * Get category group by id.
     *
     * @param string $group_name
     *
     * @return integer
     */
    public function getGroupId($group_name)
    {
        //TODO: WTF is going on with relations???
        //return $this->model->group->where('name', $group_name)->id;
        //ucfirst() expects parameter 1 to be string, array given
        //dd($group_name);
        return Group::where('name', '=', ucfirst($group_name))->value('id');
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

    public function find($id, $columns = array('*'))
    {
        return $this->model->find($id, $columns);
    }

    public function findBy($attribute, $value, $columns = array('*'))
    {
        return $this->model->where($attribute, '=', $value)->first($columns);
    }
}
