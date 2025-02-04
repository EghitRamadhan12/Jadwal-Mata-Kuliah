<?php

namespace App\Repositories;

use App\Http\Requests\mataKuliahRequest;
use App\Interfaces\mataKuliahInterface;
use App\Models\MataKuliah;
use App\Models\prodi;
use App\Traits\HttpResponseTrait;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class MataKuliahRepositories implements mataKuliahInterface
{
    protected $prodiModel;
    protected $mataKuliahModel; 
    use HttpResponseTrait;

    public function __construct(MataKuliah $mataKuliahModel,prodi  $prodiModel)
    {
        $this->mataKuliahModel = $mataKuliahModel;
        $this->prodiModel = $prodiModel;
    }

    public function getAllData()
    {
        $data = $this->mataKuliahModel->with('prodi')->get();

        if (!$data) {
            return $this->dataNotFound();
        } else {
            return $this->success($data, 'success', 'success get all data');
        }
    }

    public function createData(mataKuliahRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = new $this->mataKuliahModel;
            $data->id_prodi = $request->input('id_prodi');
            $data->mk = $request->input('mk');
            $data->sks = $request->input('sks');
            $data->save();
            DB::commit();
            return $this->success($data, 'success', 'success create data');
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 500);
        }
    }

    public function getDataById($id)
    {
        $data = $this->mataKuliahModel->find($id);
        if (!$data) {
            return $this->dataNotFound();
        } else {
            return $this->success($data, 'success', 'success get data by id');
        }
    }

    public function updateData(mataKuliahRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $data = $this->mataKuliahModel->find($id);
            if (!$data) {
                return $this->dataNotFound();
            }
            $data->id_prodi = $request->input('id_prodi');
            $data->mk = $request->input('mk');
            $data->sks = $request->input('sks');
            $data->save();
            DB::commit();
            return $this->success($data, 'success', 'success update data');
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    public function deleteData($id)
    {
        try {
            $data = $this->mataKuliahModel->find($id);
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