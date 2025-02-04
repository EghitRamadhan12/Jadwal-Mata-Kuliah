<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\kelasRequest;
use App\Repositories\kelasRepositories;
use Illuminate\Http\Request;

class kelasController extends Controller
{
    protected $kelasRepositories;

    public function __construct(kelasRepositories $kelasInteraface)
    {
        $this->kelasRepositories = $kelasInteraface;
    }

    public function getAllData()
    {
        return $this->kelasRepositories->getAllData();
    }
    public function createData(kelasRequest $request)
    {
        return $this->kelasRepositories->createData($request);
    }
    public function getDataById($id){
        return $this->kelasRepositories->getDataById($id);
    }
    public function updateData(kelasRequest $request, $id){
        return $this->kelasRepositories->updateData($request, $id);
    }
    public function deleteData($id){
        return $this->kelasRepositories->deleteData($id);
    }
}
