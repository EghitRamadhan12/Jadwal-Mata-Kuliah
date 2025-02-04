<?php

namespace App\Interfaces;

use App\Http\Requests\DosenRequest;

interface DosenInterface
{
    public function getAllData();
    public function createData(DosenRequest $request);
    public function getDataById($id);
    public function updateData(DosenRequest $request, $id);
    public function deleteData($id);
}
