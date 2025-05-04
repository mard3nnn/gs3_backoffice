<?php

namespace App\Repository\Base;

use Illuminate\Database\Eloquent\Model;


abstract class BaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function list(bool $paginate = true, int $perPage = 10)
    {
        try {
            if ($paginate) {
                return $this->model->paginate($perPage);
            } else {
                return $this->model->all();
            }
        } catch (\Exception $e) {
            return ['error' => true, 'message' => $e->getMessage()];
        }
    }

    public function findById($id)
    {
        try {
            return $this->model->find($id);
        } catch (\Exception $e) {
            return ['error' => true, 'message' => $e->getMessage()];
        }
    }

    public function create(array $data)
    {
        try {
            $record = $this->model->create($data);
            return ['error' => false, 'data' => $record, 'message' => 'Dado inserido com sucesso!'];
        } catch (\Exception $e) {
            return ['error' => true, 'message' => $e->getMessage()];
        }
    }

    public function update($id, array $data)
    {
        try {
            $record = $this->model->find($id);
            if (!$record) {
                return ['error' => true, 'message' => 'Record not found'];
            }
            $record->update($data);
            return $record;
        } catch (\Exception $e) {
            return ['error' => true, 'message' => $e->getMessage()];
        }
    }

    public function delete($id)
    {
        try {
            $record = $this->model->find($id);
            if (!$record) {
                return ['error' => true, 'message' => 'Record not found'];
            }
            $record->delete();
            return ['success' => true, 'message' => 'Record deleted successfully'];
        } catch (\Exception $e) {
            return ['error' => true, 'message' => $e->getMessage()];
        }
    }
}