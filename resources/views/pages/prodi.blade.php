@extends('layouts.master')
@section('content')
    <div class="card">
        <x-base-header headerTitle="Data Prodi" buttonAdd="true" headerAddButton="Tambah Prodi" 
                modalId="#prodiModal" buttonGenerate="false" buttonExport="false" exportId="exportProdi">
        </x-base-header>
        <x-base-body>
                <x-base-table initId="dataTable">
                        <x-slot name="thead">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Prodi</th>
                                    <th>Aksi</th>
                                </tr>
                        </x-slot>
                </x-base-table>
        </x-base-body>  
        <x-prodi.prodi-modal></x-prodi.prodi-modal>
        <script type="module" src="{{ asset('js/prodi/prodi.controller.js')}}"></script>
    </div>
@endsection