<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ruangRequest;
use App\Repositories\ruangRepositories;
use Illuminate\Http\Request;

class ruangController extends Controller
{
    protected $ruangRepositories;

    public function __construct(ruangRepositories $ruangInteraface)
    {
        $this->ruangRepositories = $ruangInteraface;
    }

    public function getAllData()
    {
        return $this->ruangRepositories->getAllData();
    }
    public function createData(ruangRequest $request)
    {
        return $this->ruangRepositories->createData($request);
    }
    public function getDataById($id){
        return $this->ruangRepositories->getDataById($id);
    }
    public function updateData(ruangRequest $request, $id){
        return $this->ruangRepositories->updateData($request, $id);
    }
    public function deleteData($id){
        return $this->ruangRepositories->deleteData($id);
    }
}
