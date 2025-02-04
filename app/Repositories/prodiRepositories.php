<?php

namespace App\Repositories;

use App\Http\Requests\prodiRequest;
use App\Interfaces\prodiInterface;
use App\Models\MataKuliah;
use App\Models\prodi;
use App\Traits\HttpResponseTrait;

class prodiRepositories implements prodiInterface
{
    protected $prodiModel; 
    protected $mataKuliahModel;
    use HttpResponseTrait;

    public function __construct(prodi $prodiModel,MataKuliah $mataKuliahModel)
    {
        $this->prodiModel = $prodiModel;
        $this->mataKuliahModel = $mataKuliahModel;
    }

    public function getAllData()
    {
        $data = $this->prodiModel->all();
        if (!$data) {
            return $this->dataNotFound();
        } else {
            return $this->success($data, 'success', 'success get all data');
        }
    }

    public function createData(prodiRequest $request)
    {
        try {
            
            $data = new $this->prodiModel;
            // Melakukan cek data yang duplikasi pada Database
            $exists = $this->prodiModel->where('nm_prodi', $request->input('nm_prodi'))->exists();
            if ($exists) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Nama prodi sudah ada',
                ], 422);
            }
            $data->nm_prodi = $request->input('nm_prodi');
            $data->save();
            
            return $this->success($data, 'success', 'success create data');
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 500);
        }
    }

    public function getDataById($id)
    {
        $data = $this->prodiModel->find($id);
        if (!$data) {
            return $this->dataNotFound();
        } else {
            return $this->success($data, 'success', 'success get data by id');
        }
    }

    public function updateData(prodiRequest $request, $id)
    {
        try {
            $data = $this->prodiModel->find($id);
            if (!$data) {
                return $this->dataNotFound();
            }
            $exists = $this->prodiModel->where('nm_prodi', $request->input('nm_prodi'))->exists();
            if ($exists) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Nama prodi sudah ada',
                ], 422);
            }
            $data->nm_prodi = $request->input('nm_prodi');
            $data->save();
            return $this->success($data, 'success', 'success update data');
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    public function deleteData($id)
    {
        try {
            $data = $this->prodiModel->find($id);
            if (!$data) {
                return $this->dataNotFound();
            }
            $exists = $this->mataKuliahModel->where('id_prodi', $id)->exists();
            if ($exists) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Data sedang digunakan',
                ], 422);
            }
            $data->delete();
            return $this->success($data, 'success', 'success delete data');
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 500);
        }
    }
}