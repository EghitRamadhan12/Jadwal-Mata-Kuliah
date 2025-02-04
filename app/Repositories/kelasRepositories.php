<?php

namespace App\Repositories;

use App\Http\Requests\kelasRequest;
use App\Interfaces\kelasInterface;
use App\Models\kelas;
use App\Traits\HttpResponseTrait;

class kelasRepositories implements kelasInterface
{
    protected $kelasModel; 
    use HttpResponseTrait;

    public function __construct(kelas $kelasModel)
    {
        $this->kelasModel = $kelasModel;
    }

    public function getAllData()
    {
        $data = $this->kelasModel->all();
        if (!$data) {
            return $this->dataNotFound();
        } else {
            return $this->success($data, 'success', 'success get all data');
        }
    }

    public function createData(kelasRequest $request)
    {
        try {
            
            $data = new $this->kelasModel;
            $exists = $this->kelasModel->where('kelas', $request->input('kelas'))->exists();
            if ($exists) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Nama kelas sudah ada',
                ], 422);
            }
            $data->kelas = $request->input('kelas');
            $data->save();
            
            return $this->success($data, 'success', 'success create data');
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 500);
        }
    }

    public function getDataById($id)
    {
        $data = $this->kelasModel->find($id);
        if (!$data) {
            return $this->dataNotFound();
        } else {
            return $this->success($data, 'success', 'success get data by id');
        }
    }

    public function updateData(kelasRequest $request, $id)
    {
        try {
            $data = $this->kelasModel->find($id);
            if (!$data) {
                return $this->dataNotFound();
            }
            $exists = $this->kelasModel->where('kelas', $request->input('kelas'))->exists();
            if ($exists) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Nama kelas sudah ada',
                ], 422);
            }
            $data->kelas = $request->input('kelas');
            $data->save();

            return $this->success($data, 'success', 'success update data');
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    public function deleteData($id)
    {
        try {
            $data = $this->kelasModel->find($id);
            if (!$data) {
                return $this->dataNotFound();
            }
            
            $data->delete();
            return $this->success($data, 'success', 'success delete data');
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 500);
        }
    }
}