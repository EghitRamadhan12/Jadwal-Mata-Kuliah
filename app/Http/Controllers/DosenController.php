<?php

namespace App\Http\Controllers;

use App\Http\Requests\DosenRequest;
use App\Repositories\DosenRepositories;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    protected $DosenRepositories;

    public function __construct(DosenRepositories $DosenInteraface)
    {
        $this->DosenRepositories = $DosenInteraface;
    }

    public function getAllData()
    {
        return $this->DosenRepositories->getAllData();
    }
    public function createData(DosenRequest $request)
    {
        return $this->DosenRepositories->createData($request);
    }
    public function getDataById($id){
        return $this->DosenRepositories->getDataById($id);
    }
    public function updateData(DosenRequest $request, $id){
        return $this->DosenRepositories->updateData($request, $id);
    }
    public function deleteData($id){
        return $this->DosenRepositories->deleteData($id);
    }
}
