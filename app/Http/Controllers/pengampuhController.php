<?php

namespace App\Http\Controllers;

use App\Http\Requests\pengampuhRequest;
use App\Repositories\pengampuhRepositories;
use Illuminate\Http\Request;
use SebastianBergmann\CodeUnit\FunctionUnit;

class pengampuhController extends Controller
{
    protected $pengampuhRepositories;

    public function __construct(pengampuhRepositories $pengampuhRepo)
    {
        $this->pengampuhRepositories = $pengampuhRepo;
    }

    public function getAllData()
    {
        return $this->pengampuhRepositories->getAllData();
    }

    public function createData(pengampuhRequest $request)
    {
        return $this->pengampuhRepositories->createData($request);
    }

    public function getDataById($id)
    {
        return $this->pengampuhRepositories->getDataById($id);
    }

    public function updateData(pengampuhRequest $request, $id)
    {
        return $this->pengampuhRepositories->updateData($request, $id);
    }

    public function deleteData($id)
    {
        return $this->pengampuhRepositories->deleteData($id);
    }
}
