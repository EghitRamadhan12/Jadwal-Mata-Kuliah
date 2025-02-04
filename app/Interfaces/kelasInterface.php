<?php

namespace App\Interfaces;

use App\Http\Requests\kelasRequest;

interface kelasInterface
{
    public function getAllData();
    public function createData(kelasRequest $request);
    public function getDataById($id);
    public function updateData(kelasRequest $request, $id);
    public function deleteData($id);
}
