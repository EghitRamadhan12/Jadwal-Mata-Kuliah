<?php

namespace App\Http\Controllers;

use App\Http\Requests\prodiRequest;
use App\Repositories\prodiRepositories;
use Illuminate\Http\Request;

class prodiController extends Controller
{
    protected $prodiRepositories;

    public function __construct(prodiRepositories $prodiInteraface)
    {
        $this->prodiRepositories = $prodiInteraface;
    }   

    public function getAllData()
    {
        return $this->prodiRepositories->getAllData();
    }

    public function createData(prodiRequest $request)
    {
        return $this->prodiRepositories->createData($request);
    }

    public function getDataById($id){
        return $this->prodiRepositories->getDataById($id);
    }

    public function updateData(prodiRequest $request, $id){
        return $this->prodiRepositories->updateData($request, $id);
    }

    public function deleteData($id){
        return $this->prodiRepositories->deleteData($id);
    }
}
