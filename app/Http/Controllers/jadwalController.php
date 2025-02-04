<?php

namespace App\Http\Controllers;

use App\Http\Requests\jadwalRequest;
use App\Repositories\jadwalRepositories;
use Illuminate\Http\Request;

class jadwalController extends Controller
{
    protected $JadwalRepositories;

    public function __construct(jadwalRepositories $JadwalInterface)
    {
        $this->JadwalRepositories = $JadwalInterface;
    }

    public function getAllData()
    {
        return $this->JadwalRepositories->getAllData();
    }

    public function createData(jadwalRequest $request)
    {
        return $this->JadwalRepositories->createData($request);
    }

    public function getDataById($id)
    {
        return $this->JadwalRepositories->getDataById($id);
    }

    public function updateData(jadwalRequest $request, $id)
    {
        return $this->JadwalRepositories->updateData($request, $id);
    }

    public function deleteData($id)
    {
        return $this->JadwalRepositories->deleteData($id);
    }
}
