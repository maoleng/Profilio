<?php

namespace App\Services;

use Exception;
use App\Models\Base as BaseModel;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\ArrayShape;

abstract class BaseService
{
    protected $db;
    protected $model;

    public function __construct()
    {
        $this->boot();
    }

    public function __call($method, $params)
    {
        if ($this->model) {
            return call_user_func_array([$this->model, $method], $params);
        }

        return call_user_func_array([$this->db->getDatabaseManager()->connection(), $method], $params);
    }

    protected function boot()
    {
    }

    protected function newQuery()
    {
        return $this->query();
    }

    protected function fetchQuery(Request $request)
    {
        return $this->newQuery();
    }

    protected function findQuery(Request $request)
    {
        return $this->fetchQuery($request);
    }

    protected function listQuery(Request $request)
    {
        return $this->fetchQuery($request);
    }

    protected function updateQuery()
    {
        return $this->newQuery();
    }

    protected function destroyQuery()
    {
        return $this->newQuery();
    }

    #[ArrayShape(['status' => "false", 'message' => "mixed|string"])]
    protected function errorResult($e): array
    {
        $message = method_exists($e, 'getMessage') ? $e->getMessage() : "";
        return [
            'status' => false,
            'message' => $message,
        ];
    }

    public function create($data): array
    {
        try {
            $model = $this->make($data);
            $save = $model->save();
            return [
                'status' => $save,
                'model' => $model,
            ];

        } catch (Exception $e) {
            return $this->errorResult($e);
        }
    }

    public function update($id, array $data): array
    {
        try {
            $query = $this->updateQuery();
            $model = $query->find($id);

            if (!$model instanceof BaseModel) {
                throw new \RuntimeException("Record not found!");
            }

            $model->fill($data);
            $save = $model->save();

            return [
                'status' => $save,
                'model' => $model,
            ];

        } catch (Exception $e) {
            return $this->errorResult($e);
        }
    }

    public function destroy($id): array
    {
        try {
            $query = $this->destroyQuery();
            $model = $query->find($id);
            if (!$model instanceof BaseModel) {
                throw new \RuntimeException("Record not found!");
            }
            $save = $model->destroy($id);

            return [
                'status' => $save,
            ];
        } catch (Exception $e) {
            return $this->errorResult($e);
        }
    }

}
