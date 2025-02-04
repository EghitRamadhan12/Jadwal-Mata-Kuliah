<?php

namespace App\Interfaces;

use App\Http\Requests\jadwalRequest;

interface jadwalInterface
{
    public function getAllData();
    public function createData(jadwalRequest $request);
    public function getDataById($id);
    public function updateData(jadwalRequest $request, $id);
    public function deleteData($id);
}
