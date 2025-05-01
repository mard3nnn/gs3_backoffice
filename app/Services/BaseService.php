<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Exception;

abstract class BaseService
{
  protected $model;

  public function __construct(Model $model)
  {
    $this->model = $model;
  }

  public function getAll()
  {
    try {
      return $this->model->all();
    } catch (Exception $e) {
      $this->handleError($e);
      return [];
    }
  }

  public function getById($id)
  {
    try {
      return $this->model->find($id);
    } catch (Exception $e) {
      $this->handleError($e);
      return null;
    }
  }

  public function create(array $data)
  {
    try {
      return $this->model->create($data);
    } catch (Exception $e) {
      $this->handleError($e);
      return null;
    }
  }

  public function update($id, array $data)
  {
    try {
      $record = $this->model->find($id);
      if ($record) {
        $record->update($data);
        return $record;
      }
      return null;
    } catch (Exception $e) {
      $this->handleError($e);
      return null;
    }
  }

  public function delete($id)
  {
    try {
      $record = $this->model->find($id);
      if ($record) {
        $record->delete();
        return true;
      }
      return false;
    } catch (Exception $e) {
      $this->handleError($e);
      return false;
    }
  }

  protected function handleError(Exception $e)
  {
    Log::error('Error: ' . $e->getMessage());
  }
}