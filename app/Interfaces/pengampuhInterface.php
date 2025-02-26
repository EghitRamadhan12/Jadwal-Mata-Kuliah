<?php

namespace App\Interfaces;

use App\Http\Requests\pengampuhRequest;

interface pengampuhInterface
{
    public function getAllData();
    public function createData(pengampuhRequest $request);
    public function getDataById($id);
    public function updateData(pengampuhRequest $request, $id);
    public function deleteData($id);
}
