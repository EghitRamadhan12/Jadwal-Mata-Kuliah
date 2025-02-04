<?php

namespace App\Repositories;

use App\Http\Requests\jadwalRequest;
use App\Interfaces\jadwalInterface;
use App\Models\Dosen;
use App\Models\Jadwal;
use App\Models\kelas;
use App\Models\ruang;
use App\Models\Semester;
use App\Traits\HttpResponseTrait;
use App\View\Components\matakuliah\mataKuliah;
use Illuminate\Support\Facades\DB;

class jadwalRepositories implements jadwalInterface
{
    protected $jadwalModel;
    protected $ruangModel;
    protected $mataKuliahModel;
    protected $kelasModel;
    protected $semsterModel;
    protected $dosenModel;
    use HttpResponseTrait;

    public function __construct(Jadwal $jadwalModel, ruang $ruangModel, mataKuliah $mataKuliahModel, kelas $kelasModel,Semester $semsterModel,Dosen  $dosenModel)
    {
        $this->jadwalModel = $jadwalModel;
        $this->ruangModel = $ruangModel;
        $this->mataKuliahModel = $mataKuliahModel;
        $this->kelasModel = $kelasModel;
        $this->semsterModel = $semsterModel;
        $this->dosenModel = $dosenModel;
    }

    public function getAllData()
    {
        $data = $this->jadwalModel->with('ruang', 'mataKuliah', 'kelas', 'semester', 'dosen')->get();
        if (!$data) {
            return $this->dataNotFound();
        } else {
            return $this->success($data, 'success', 'success get all data');
        }
    }

    public function createData(jadwalRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = new $this->jadwalModel;
            $data->id_dosen = $request->input('id_dosen');
            $data->id_mk = $request->input('id_mk');
            $data->id_kelas = $request->input('id_kelas');
            $data->id_ruang = $request->input('id_ruang');
            $data->id_semester = $request->input('id_semester');
            $data->hari = $request->input('hari');
            $data->jam_mulai = $request->input('jam_mulai');
            $data->jam_selesai = $request->input('jam_selesai');
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
        $data = $this->jadwalModel->find($id);
        if (!$data) {
            return $this->dataNotFound();
        } else {
            return $this->success($data, 'success', 'success get data by id');
        }
    }

    public function updateData(jadwalRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $data = $this->jadwalModel->find($id);
            if (!$data) {
                return $this->dataNotFound();
            }
            $data->id_dosen = $request->input('id_dosen');
            $data->id_mk = $request->input('id_mk');
            $data->id_kelas = $request->input('id_kelas');
            $data->id_ruang = $request->input('id_ruang');
            $data->id_semester = $request->input('id_semester');
            $data->hari = strtolower($request->hari);
            $data->jam_mulai = $request->input('jam_mulai');
            $data->jam_selesai = $request->input('jam_selesai');
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
            $data = $this->jadwalModel->find($id);
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