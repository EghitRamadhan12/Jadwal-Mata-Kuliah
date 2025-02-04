<?php

namespace App\Http\Controllers;

use App\Http\Requests\semesterRequest;
use App\Repositories\semesterRepositories;
use Illuminate\Http\Request;

class semesterController extends Controller
{
    protected $semesterRepositories;

    public function __construct(semesterRepositories $semesterInterface)
    {
        $this->semesterRepositories = $semesterInterface;;
    }

    public function getAllData()
    {
        return $this->semesterRepositories->getAllData();
    }

    public function createData(semesterRequest $request)
    {
        return $this->semesterRepositories->createData($request);
    }

    public function updateData(semesterRequest $request, $id){
        return $this->semesterRepositories->updateData($request, $id);
    }

    public function getDataById($id)
    {
        return $this->semesterRepositories->getDataById($id);
    }

    public function deleteData($id){
        return $this->semesterRepositories->deleteData($id);
    }
}
