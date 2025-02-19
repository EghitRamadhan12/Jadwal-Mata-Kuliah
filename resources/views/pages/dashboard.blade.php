@extends('layouts.master')
@section('content')
<div class="content-wrapper">
<div class="row">
    <div class="col-lg-3 col-6 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <div class="row">
            <div class="col-9">
                <div class="d-flex align-items-center align-self-start">
                <h3 class="mb-0">21</h3>
                </div>
            </div>
            <div class="col-3">
                <div class="icon icon-box-success">
                    <span class="mdi mdi-account-multiple icon-item"></span>
                </div>
            </div>
        </div>
        <h6 class="text-muted font-weight-normal">Jumlah Dosen</h6>
        <div class="icon icon-box-primary w-75 mt-4">
            <a href=" {{ url('/dosen')}}" class="align-items-center text-primary"> Info lengkap <span class="mdi mdi-arrow-right icon-item  align-middle"></span></a>
        </div>
        </div>
        </div>
    </div>
    <div class="col-lg-3 col-6 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <div class="row">
            <div class="col-9">
                <div class="d-flex align-items-center align-self-start">
                <h3 class="mb-0">12</h3>
                </div>
            </div>
            <div class="col-3">
                <div class="icon icon-box-success">
                    <span class="mdi mdi-account-multiple icon-item"></span>
                </div>
            </div>
        </div>
        <h6 class="text-muted font-weight-normal">Jumlah Kelas</h6>
        <div class="icon icon-box-primary w-75 mt-4">
            <a href=" {{ url('/kelas')}}" class="align-items-center text-primary"> Info lengkap <span class="mdi mdi-arrow-right icon-item  align-middle"></span></a>
        </div>
        </div>
        </div>
    </div>
    <div class="col-lg-3 col-6 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <div class="row">
            <div class="col-9">
                <div class="d-flex align-items-center align-self-start">
                <h3 class="mb-0">8</h3>
                </div>
            </div>
            <div class="col-3">
                <div class="icon icon-box-success">
                    <span class="mdi mdi-account-multiple icon-item"></span>
                </div>
            </div>
        </div>
        <h6 class="text-muted font-weight-normal">Jumlah Ruang</h6>
        <div class="icon icon-box-primary w-75 mt-4">
            <a href=" {{ url('/ruang')}}" class="align-items-center text-primary"> Info lengkap <span class="mdi mdi-arrow-right icon-item  align-middle"></span></a>
        </div>
        </div>
        </div>
    </div>
    <div class="col-lg-3 col-6 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <div class="row">
            <div class="col-9">
                <div class="d-flex align-items-center align-self-start">
                <h3 class="mb-0">2</h3>
                </div>
            </div>
            <div class="col-3">
                <div class="icon icon-box-success">
                    <span class="mdi mdi-account-multiple icon-item"></span>
                </div>
            </div>
        </div>
        <h6 class="text-muted font-weight-normal">Jumlah Prodi</h6>
        <div class="icon icon-box-primary w-75 mt-4">
            <a href=" {{ url('/prodi')}}" class="align-items-center text-primary"> Info lengkap <span class="mdi mdi-arrow-right icon-item  align-middle"></span></a>
        </div>
        </div>
        </div>
    </div>
    <div class="col-lg-3 col-6 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <div class="row">
            <div class="col-9">
                <div class="d-flex align-items-center align-self-start">
                <h3 class="mb-0">40</h3>
                </div>
            </div>
            <div class="col-3">
                <div class="icon icon-box-success">
                    <span class="mdi mdi-account-multiple icon-item"></span>
                </div>
            </div>
        </div>
        <h6 class="text-muted font-weight-normal">Jumlah Mata Kuliah</h6>
        <div class="icon icon-box-primary w-75 mt-4">
            <a href=" {{ url('/matakuliah')}}" class="align-items-center text-primary"> Info lengkap <span class="mdi mdi-arrow-right icon-item  align-middle"></span></a>
        </div>
        </div>
        </div>
    </div>
    {{-- <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <div class="row">
            <div class="col-9">
                <div class="d-flex align-items-center align-self-start">
                <h3 class="mb-0">$17.34</h3>
                <p class="text-success ml-2 mb-0 font-weight-medium">+11%</p>
                </div>
            </div>
            <div class="col-3">
                <div class="icon icon-box-success">
                <span class="mdi mdi-arrow-top-right icon-item"></span>
                </div>
            </div>
            </div>
            <h6 class="text-muted font-weight-normal">Revenue current</h6>
        </div>
        </div>
    </div> --}}
    {{-- <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <div class="row">
            <div class="col-9">
                <div class="d-flex align-items-center align-self-start">
                <h3 class="mb-0">$12.34</h3>
                <p class="text-danger ml-2 mb-0 font-weight-medium">-2.4%</p>
                </div>
            </div>
            <div class="col-3">
                <div class="icon icon-box-danger">
                <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                </div>
            </div>
            </div>
            <h6 class="text-muted font-weight-normal">Daily Income</h6>
        </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <div class="row">
            <div class="col-9">
                <div class="d-flex align-items-center align-self-start">
                <h3 class="mb-0">$31.53</h3>
                <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
                </div>
            </div>
            <div class="col-3">
                <div class="icon icon-box-success ">
                <span class="mdi mdi-arrow-top-right icon-item"></span>
                </div>
            </div>
            </div>
            <h6 class="text-muted font-weight-normal">Expense current</h6>
        </div>
        </div>
    </div> --}}
    </div>
</div>
@endsection