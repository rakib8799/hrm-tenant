<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

abstract class BaseModelService
{
    abstract public function model(): string;

    public function first()
    {
        return $this->model()::first();
    }

    public function all()
    {
        return $this->model()::orderBy('type', 'ASC')->get();
    }

    public function find($primaryKey)
    {
        return $this->model()::find($primaryKey);
    }

    public function findOrFail($primaryKey)
    {
        return $this->model()::findOrFail($primaryKey);
    }

    public function delete($primaryKey)
    {
        return $this->model()::destroy($primaryKey);
    }

    public function create(array $validatedData)
    {
        return $this->model()::create($validatedData);
    }

    public function update(Model $model, array $data): bool
    {
        return $model->update($data);
    }
}
