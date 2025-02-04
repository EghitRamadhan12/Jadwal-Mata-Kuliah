<?php

namespace App\Repositories;

use App\Http\Requests\semesterRequest;
use App\Interfaces\semesterInterface;
use App\Models\Semester;
use App\Traits\HttpResponseTrait;

class semesterRepositories implements semesterInterface
{
    protected $semesterModel;
    use HttpResponseTrait;

    public function __construct(Semester $semesterModel)
    {
        $this->semesterModel = $semesterModel;
    }

    public function getAllData()
    {
        $data = $this->semesterModel->all();
        if (!$data) {
            return $this->dataNotFound();
        } else {
            return $this->success($data, 'success', 'success get all data');
        }
    }

    public function createData (semesterRequest $request)
    {
        try {
            $data = new $this->semesterModel;
            $data->semester = $request->input('semester');
            $data->tgl_mulai = $request->input('tgl_mulai');
            $data->tgl_selesai = $request->input('tgl_selesai');
            $data->save();
            return $this->success($data, 'success', 'success create data');
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 500);
        }
    }

    public function getDataById($id)
    {
        $data = $this->semesterModel->find($id);
        if (!$data) {
            return $this->dataNotFound();
        } else {
            return $this->success($data, 'success', 'success get data by id');
        }
    }

    public function updateData(semesterRequest $request, $id)
    {
        try {
            $data = $this->semesterModel->find($id);
            if (!$data) {
                return $this->dataNotFound();
            }
            $data->semester = $request->input('semester');
            $data->tgl_mulai = $request->input('tgl_mulai');
            $data->tgl_selesai = $request->input('tgl_selesai');
            $data->save();
            return $this->success($data, 'success', 'success update data');
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }
    
    public function deleteData($id)
    {
        try {
            $data = $this->semesterModel->find($id);
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