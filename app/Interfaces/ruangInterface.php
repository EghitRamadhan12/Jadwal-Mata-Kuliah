<?php

namespace App\Interfaces;

use App\Http\Requests\ruangRequest;

interface ruangInterface
{
    public function getAllData();
    public function createData(ruangRequest $request);
    public function getDataById($id);
    public function updateData(ruangRequest $request, $id);
    public function deleteData($id);
}
