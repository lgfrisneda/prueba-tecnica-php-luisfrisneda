<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class Repository
{

    protected Model $model;


    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {

        return $this->model->all();
    }

    public function save(Model $model)
    {
        $model->save();

        return $model;
    }

    public function delete(Model $model)
    {
        $model->delete();

        return $model;
    }

    public function find($id)
    {
        return $this->model->find($id);
    }
}