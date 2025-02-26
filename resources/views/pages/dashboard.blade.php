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
                                <h3 class="mb-0" id="dosenCount"></h3>
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
                        <a href="{{ url('/dosen') }}" class="align-items-center text-primary"> Info lengkap <span class="mdi mdi-arrow-right icon-item align-middle"></span></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Repeat for other cards -->
        <div class="col-lg-3 col-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0" id="prodiCount"></h3>
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
                        <a href="{{ url('/prodi') }}" class="align-items-center text-primary"> Info lengkap <span class="mdi mdi-arrow-right icon-item align-middle"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        getCountRegister();
    });

    function ajaxRequest(url, method, data = null) {
        return new Promise((resolve, reject) => {
            $.ajax({
                url,
                method,
                data,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (response) => resolve(response),
                error: (error) => reject(error),
            });
        });
    }

    async function getCountRegister() {
        try {
            const responseData = await ajaxRequest(`${appUrl}/v1/dashboard/count-jadwal`, 'GET');
            console.log('Response: ', responseData);
            $('#dosenCount').html(responseData.dosen);
            $('#kelasCount').html(responseData.kelas);
            $('#ruangCount').html(responseData.ruang);
            $('#prodiCount').html(responseData.prodi);
            $('#matakuliahCount').html(responseData.matakuliah);
        } catch (error) {
            console.log(error);
        }
    }
</script>
@endsection