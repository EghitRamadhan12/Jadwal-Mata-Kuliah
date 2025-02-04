<?php

namespace App\Repositories;

use App\Http\Requests\DosenRequest;
use App\Interfaces\DosenInterface;
use App\Models\Dosen;
use App\Traits\HttpResponseTrait;

class DosenRepositories implements DosenInterface
{
    protected $dosenModel; 
    use HttpResponseTrait;

    public function __construct(Dosen $dosenModel)
    {
        $this->dosenModel = $dosenModel;
    }

    public function getAllData()
    {
        $data = $this->dosenModel->all();

        if (!$data) {
            return $this->dataNotFound();
        } else {
            return $this->success($data, 'success', 'success get all data');
        }
    }

    public function createData(DosenRequest $request)
    {
        try {
            $data = new $this->dosenModel;
            $data->dosen = $request->input('dosen');
            $data->jabatan = $request->input('jabatan');
            $data->no_telp = $request->input('no_telp');
            $data->save();
            
            return $this->success($data, 'success', 'success create data');
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 500);
        }
    }

    public function getDataById($id)
    {
        $data = $this->dosenModel->find($id);
        if (!$data) {
            return $this->dataNotFound();
        } else {
            return $this->success($data, 'success', 'success get data by id');
        }
    }

    public function updateData(DosenRequest $request, $id)
    {
        try {
            $data = $this->dosenModel->find($id);
            if (!$data) {
                return $this->dataNotFound();
            }
            // $data->dosen = $request->input('dosen');
            // $data->jabatan = $request->input('jabatan');
            // $data->no_telp = $request->input('no_telp');
            // $data->save();
            $data->update($request->all());

            return $this->success($data, 'success', 'success update data');
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    public function deleteData($id)
    {
        try {
            $data = $this->dosenModel->find($id);
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