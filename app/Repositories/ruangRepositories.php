<?php

namespace App\Repositories;

use App\Http\Requests\ruangRequest;
use App\Interfaces\ruangInterface;
use App\Models\ruang;
use App\Traits\HttpResponseTrait;

class ruangRepositories implements ruangInterface
{
    protected $ruangModel; 
    use HttpResponseTrait;

    public function __construct(ruang $ruangModel)
    {
        $this->ruangModel = $ruangModel;
    }

    public function getAllData()
    {
        $data = $this->ruangModel->all();
        if (!$data) {
            return $this->dataNotFound();
        } else {
            return $this->success($data, 'success', 'success get all data');
        }
    }

    public function createData(ruangRequest $request)
    {
        try {
            $exists = $this->ruangModel->where('ruang', $request->input('ruang'))->exists();
            if ($exists) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Nama ruang sudah',
                ], 422);
            }
            $data = new $this->ruangModel;
            $data->ruang = $request->input('ruang');
            $data->save();
            
            return $this->success($data, 'success', 'success create data');
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 500);
        }
    }

    public function getDataById($id)
    {
        $data = $this->ruangModel->find($id);
        if (!$data) {
            return $this->dataNotFound();
        } else {
            return $this->success($data, 'success', 'success get data by id');
        }
    }

    public function updateData(ruangRequest $request, $id)
    {
        try {
            $data = $this->ruangModel->find($id);
            if (!$data) {
                return $this->dataNotFound();
            }

            $exists = $this->ruangModel->where('ruang', $request->input('ruang'))->exists();
            if ($exists) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Nama ruang sudah',
                ], 422);
            }
            $data->ruang = $request->input('ruang');
            $data->save();

            return $this->success($data, 'success', 'success update data');
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    public function deleteData($id)
    {
        try {
            $data = $this->ruangModel->find($id);
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