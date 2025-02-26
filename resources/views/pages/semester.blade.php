@extends('layouts.master')
@section('content')
<div class="card">
    <x-base-header headerTitle="Data Semester" buttonAdd="true" headerAddButton="Tambah Semester" 
        modalId="#semesterModal" buttonGenerate="false" buttonExport="false" exportId="exportSemester">
    </x-base-header>
    <x-base-body>
        <x-base-table initId="dataTable">
            <x-slot name="thead">
                <tr>
                    <th>No</th>
                    <th>Nama Semester</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Aksi</th>
                </tr>
            </x-slot>
        </x-base-table>
    </x-base-body>  
    <x-semester.semester-modal></x-semester.semester-modal>
    <script type="module" src="{{ asset('js/semester/semester.controller.js')}}"></script>
</div>
@endsection