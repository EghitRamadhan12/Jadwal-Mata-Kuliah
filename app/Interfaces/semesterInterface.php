<?php

namespace App\Interfaces;

use App\Http\Requests\semesterRequest;

interface semesterInterface
{
    public function getAllData();
    public function createData(semesterRequest $request);
    public function getDataById($id);
    public function updateData(semesterRequest $request, $id);
    public function deleteData($id);
}
