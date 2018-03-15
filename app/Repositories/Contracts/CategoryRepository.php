<?php

namespace App\Repositories\Contracts;

interface CategoryRepository
{
    public function search($query, $group_id);

    public function getGroupId($group_name);

    public function all($columns = array('*'));

    public function create(array $data);

    public function delete($id);

    public function find($id, $columns = array('*'));

    public function findBy($field, $value, $columns = array('*'));
}
