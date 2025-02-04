@extends('layouts.master')
@section('content')
<div class="card">
    <x-base-header headerTitle="Data Mata Kuliah" buttonAdd="true" headerAddButton="Tambah Mata Kuliah" 
        modalId="#mataKuliahModal" buttonExport="false" exportId="exportMataKuliah">
    </x-base-header>
    <x-base-body>
        <x-base-table initId="dataTable">
            <x-slot name="thead">
                <tr>
                    <th>No</th>
                    <th>Program Studi</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Aksi</th>
                </tr>
            </x-slot>
        </x-base-table>
    </x-base-body>  
    <x-mataKuliah.mata-kuliah-modal></x-mataKuliah.mata-kuliah-modal>
    <script type="module" src="{{ asset('js/matakuliah/matakuliah.controller.js')}}"></script>
</div>
@endsection