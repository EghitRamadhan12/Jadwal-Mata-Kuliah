<?php

namespace App\Interfaces;

use App\Http\Requests\prodiRequest;

interface prodiInterface
{
    public function getAllData();
    public function createData(prodiRequest $request);
    public function getDataById($id);
    public function updateData(prodiRequest  $request, $id);
    public function deleteData($id); 
}
