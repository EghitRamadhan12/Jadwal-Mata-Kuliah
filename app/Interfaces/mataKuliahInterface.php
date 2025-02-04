<?php

namespace App\Interfaces;

use App\Http\Requests\mataKuliahRequest;

interface mataKuliahInterface
{
    public function getAllData();
    public function createData(mataKuliahRequest $request);
    public function getDataById($id);
    public function updateData(mataKuliahRequest $request, $id);
    public function deleteData($id);
}
