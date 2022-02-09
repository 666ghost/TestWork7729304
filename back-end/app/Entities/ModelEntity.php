<?php

namespace App\Entities;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ModuleFacade
 * @package App\Facades
 */
abstract class ModelEntity
{
    /** @var mixed|Model  */
    protected $model;

    /**
     * ModuleFacade constructor.
     * @throws BindingResolutionException
     */
    public function __construct()
    {
        $this->model = app()->make($this->model());
    }

    /**
     * @return string classname
     */
    abstract protected function model(): string;

    /**
     * @return array|null
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * @param int|array $ids
     * @return mixed
     */
    public function delete($ids)
    {
        return $this->model->destroy($ids);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id)
    {
        return $this->model->find($id);
    }
}
