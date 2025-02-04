<?php

namespace App\Http\Controllers;

use App\Http\Requests\mataKuliahRequest;
use App\Repositories\MataKuliahRepositories;
use Illuminate\Http\Request;

class mataKuliahController extends Controller
{
    protected $MataKuliahRepositories;     

    public function __construct(MataKuliahRepositories $mataKuliahInterface)
    {
        $this->MataKuliahRepositories = $mataKuliahInterface;
    }

    public function getAllData()
    {
        return $this->MataKuliahRepositories->getAllData();
    }

    public function createData(mataKuliahRequest $request)
    {
        return $this->MataKuliahRepositories->createData($request);
    }

    public function getDataById($id)
    {
        return $this->MataKuliahRepositories->getDataById($id);
    }

    public function updateData(mataKuliahRequest $request, $id)
    {
        return $this->MataKuliahRepositories->updateData($request, $id);
    }

    public function deleteData($id)
    {
        return $this->MataKuliahRepositories->deleteData($id);
    }
}
