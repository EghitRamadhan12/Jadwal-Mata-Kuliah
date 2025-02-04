@extends('layouts.master')
@section('content')
<div class="card">
    <x-base-header headerTitle="Data Kelas" buttonAdd="true" headerAddButton="Tambah Data" 
        modalId="#kelasModal" buttonExport="false" exportId="exportDosen">
    </x-base-header>
    <x-base-body>
        <x-base-table initId="dataTable">
            <x-slot name="thead">
                <tr>
                    <th>No</th>
                    <th>Nama Kelas</th>
                    <th>Aksi</th>
                </tr>
            </x-slot>
        </x-base-table>
    </x-base-body>  
    <x-kelas.kelas-modal></x-kelas.kelas-modal>
    <script type="module" src="{{ asset('js/kelas/kelas.controller.js')}}"></script>
</div>
@endsection