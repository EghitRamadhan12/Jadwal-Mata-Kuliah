@extends('layouts.master')
@section('content')
<div class="card">
    <x-base-header headerTitle="Data Mata Kuliah" buttonAdd="true" headerAddButton="Tambah Data" 
        modalId="#pengampuModal" buttonExport="false" exportId="exportData" buttonGenerate="false">
    </x-base-header>
    <x-base-body>
        <x-base-table initId="dataTable">
            <x-slot name="thead">
                <tr>
                    <th>No</th>
                    <th>Nama Dosen</th>
                    <th>Mata kuliah</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
            </x-slot>
        </x-base-table>
    </x-base-body>  
    <x-pengampu.pengampu-modal></x-pengampu.pengampu-modal>
    <script type="module" src="{{ asset('js/pengampu/pengampu.controller.js')}}"></script>
</div>
@endsection