@extends('layouts.master')
@section('content')
<div class="card">
    <x-base-header headerTitle="Data Ruang" buttonAdd="true" headerAddButton="Tambah Ruang" 
        modalId="#ruangModal" buttonGenerate="false" buttonExport="false" exportId="exportRuang">
    </x-base-header>
    <x-base-body>
        <x-base-table initId="dataTable">
            <x-slot name="thead">
                <tr>
                    <th>No</th>
                    <th>Nama Ruang</th>
                    <th>Aksi</th>
                </tr>
            </x-slot>
        </x-base-table>
    </x-base-body>  
    <x-ruang.ruang-modal></x-ruang.ruang-modal>
    <script type="module" src="{{ asset('js/ruang/ruang.controller.js') }}"></script>
</div>
@endsection