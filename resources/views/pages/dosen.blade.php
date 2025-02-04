@extends('layouts.master')
@section('content')
<div class="card">
    <x-base-header headerTitle="Data Dosen" buttonAdd="true" headerAddButton="Tambah Data" 
        modalId="#dosenModal" buttonExport="false" exportId="exportDosen">
    </x-base-header>
    <x-base-body>
        <x-base-table initId="dataTable">
            <x-slot name="thead">
                <tr>
                    <th>No</th>
                    <th>Nama Dosen</th>
                    <th>Jabatan</th>
                    <th>No. Telp</th>
                    <th>Aksi</th>
                </tr>
            </x-slot>
        </x-base-table>
    </x-base-body>
    <x-dosen.dosen-modal></x-dosen.dosen-modal>
    <script type="module" src="{{ asset('js/dosen/dosen.controller.js')}}"></script>
</div>
@endsection