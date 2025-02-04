@extends('layouts.master')
@section('content')
<div class="card">
    <x-base-header headerTitle="Data Jadwal" buttonAdd="true" headerAddButton="Tambah Data" 
        modalId="#jadwalModal" buttonExport="false" exportId="exportJadwal">
    </x-base-header>
    <x-base-body>
        <x-base-table initId="dataTable">
            <x-slot name="thead">
                <tr>
                    <th>No</th>
                    <th>Nama Mata Kuliah</th>
                    <th>Nama Kelas</th>
                    <th>Nama Dosen</th>
                    <th>Nama Ruang</th>
                    <th>Semester</th>
                    <th>Hari</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Aksi</th>
                </tr>
            </x-slot>
        </x-base-table>
    </x-base-body>  
    <x-jadwal.jadwal-modal></x-jadwal.jadwal-modal>
    <script type="module" src="{{ asset('js/jadwal/jadwal.controller.js') }}"></script>
</div>
@endsection