<?php
namespace App\Repositories;

use App\Http\Requests\pengampuhRequest;
use App\Interfaces\pengampuhInterface;
use App\Models\Dosen;
use App\Models\kelas;
use App\Models\MataKuliah;
use App\Models\Pengampuh;
use App\Traits\HttpResponseTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class pengampuhRepositories implements pengampuhInterface
{
    protected $pengampuhModel;
    protected $mataKuliahModel;
    protected $kelasModel;
    protected $dosenModel;
    use HttpResponseTrait;

    public function __construct(MataKuliah $mataKuliahModel, kelas $kelasModel,Dosen  $dosenModel, Pengampuh $pengampuhModel)
    {
        $this->pengampuhModel = $pengampuhModel;
        $this->mataKuliahModel = $mataKuliahModel;
        $this->kelasModel = $kelasModel;
        $this->dosenModel = $dosenModel;
    }

    public function getAllData()
    {
        $data = $this->pengampuhModel->with('mata_kuliah', 'kelas', 'dosen')->get();
        if (!$data) {
            return $this->dataNotFound();
        } else {
            return $this->success($data, 'success', 'success get all data');
        }
    }

    public function createData(pengampuhRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = new $this->pengampuhModel;
            $data->id_dosen = $request->input('id_dosen');
            $data->id_mk = $request->input('id_mk');
            $data->id_kelas = $request->input('id_kelas');
            $data->save();
            DB::commit();
            return $this->success($data, 'success', 'success create data');
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->error($th->getMessage(), 500);
        }
    }

    public function getDataById($id)
    {
        $data = $this->pengampuhModel->find($id);
        if (!$data) {
            return $this->dataNotFound();
        } else {
            return $this->success($data, 'success', 'success get data by id');
        }
    }

    public function updateData(pengampuhRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $data = $this->pengampuhModel->find($id);
            if (!$data) {
                return $this->dataNotFound();
            }
            $data->id_dosen = $request->input('id_dosen');
            $data->id_mk = $request->input('id_mk');
            $data->id_kelas = $request->input('id_kelas');
            $data->save();
            DB::commit();
            return $this->success($data, 'success', 'success update data');
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->error($th->getMessage(), 500);
        }
    }

    public function deleteData($id)
    {
        try {
            $data = $this->pengampuhModel->find($id);
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