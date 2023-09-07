<?php

namespace App\Respositories;

abstract class BaseRespositories implements RespositoriesInterface
{
    protected $model;
    public function __construct()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    abstract public function getModel();

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update($data, $id)
    {
        $object = $this->model->find($id);
        return $object->update($data);
    }

    public function delete($id)
    {
        $object = $this->model->find($id);
        return $object->delete();
    }

    public function searchAndPaginate($searchBy, $keyword, $perPage = 5)
    {
        return $this->model
            ->where('name', 'like', '%' . $keyword . '%')
            ->orderBy('id', 'desc')
            ->paginate($perPage)
            ->appends(['search' => $keyword]);
    }
}
