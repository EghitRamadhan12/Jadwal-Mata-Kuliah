@extends('layouts.master')
@section('content')
<div class="card">
    <x-base-header headerTitle="Data Jadwal" buttonAdd="false" headerAddButton="Tambah Data" nextId="#next_step" genereteId="#mulai" buttonExport="false" exportId="exportJadwal" buttonNext="true" buttonGenerate="true" buttonNextHeader="Next" headerButtonGenerate="Generate">
    </x-base-header>
    <x-base-body>
        <x-base-table initId="dataTable">
            <x-slot name="thead">
                <tr>
                    <th>No</th>
                    <th>Hari</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Nama Mata Kuliah</th>
                    <th>Nama Kelas</th>
                    <th>Nama Dosen</th>
                    <th>Nama Ruang</th>
                    <th>Error</th>
                    <th>Pair</th>
                </tr>
            </x-slot>
            <tbody id="tabel_body">
            </tbody>
        </x-base-table>
    </x-base-body>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $("#mulai").click(async function () {
            try {
                // Panggil API untuk mendapatkan data jadwal
                var dosens = await ajaxRequest(`${appUrl}/v1/dosen`, `GET`);\
                var matkuls = await ajaxRequest(`${appUrl}/v1/mata-kuliah`, `GET`);
                var ruangs = await ajaxRequest(`${appUrl}/v1/ruang`, `GET`);
                var kelas = await ajaxRequest(`${appUrl}/v1/kelas`, `GET`);

                // Simpan data yang didapat dari API
                dosens = dosens.data;
                console.log('Response : ', dosens);
                matkuls = matkuls.data;
                console.log('Response : ', matkuls);
                ruangs = ruangs.data;
                console.log('Response : ', ruangs);
                kelas = kelas.data;
                console.log('Response : ', kelas);

                // Generate jadwal menggunakan fungsi objektif
                var jadwals = objektif(kelas, ruangs, dosens, matkuls);
                // Tampilkan data di tabel
                renderTable(jadwals);
            } catch (error) {
                console.error("Gagal mengambil data:", error);
                alert("Gagal mengambil data jadwal.");
            }
        });
    });

    async function ajaxRequest(url, method, data = null) {
        return new Promise((resolve, reject) => {
            $.ajax({
                url,
                method,
                data,
                processData: false,
                contentType: false,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                success: (response) => resolve(response),
                error: (error) => reject(error),
            });
        });
    }

    function objektif(kelas, ruangs, dosens, matkuls) {
        if (!kelas || !ruangs || !dosens || !matkuls) {
            throw new Error("Data kelas, ruang, dosen, atau mata kuliah tidak valid.");
        }

        randomize(kelas);
        var n = 0;
        var jadwals = [];
        var days = ["senin", "selasa", "rabu", "kamis", "jumat"];

        $.each(days, function (idx1, day) {
            for (var i = 0; i < 3; i++) {
                $.each(ruangs, function (idx2, ruang) {
                    if (n < kelas.length) {
                        var jadwal = {
                            hari: day,
                            jam_mulai: cek_hari(jadwals, day, ruang.ruang, "08:00", kelas[n].sks),
                            jam_selesai: jam_selesai("08:00", kelas[n].sks),
                            id_ruang: ruang.id,
                            ruang: ruang.ruang,
                            mk: kelas[n].mk,
                            id_mk: kelas[n].id,
                            id_dosen: kelas[n].id_dosen,
                            dosen: kelas[n].dosen,
                            id_kelas: kelas[n].id_kelas,
                            kelas: kelas[n].kelas,
                            sks: kelas[n].sks,
                            error: 0,
                            pair: n,
                        };
                        jadwals.push(jadwal);
                        n++;
                    }
                });
            }
        });
        return jadwals;
    }

    function renderTable(jadwals) {
        var tableBody = "";
        $.each(jadwals, function (idx, jadwal) {
            tableBody += `<tr>
                <td>${idx + 1}</td>
                <td>${jadwal.hari}</td>
                <td>${jadwal.jam_mulai}</td>
                <td>${jadwal.jam_selesai}</td>
                <td>${jadwal.mk}</td>
                <td>${jadwal.kelas}</td>
                <td>${jadwal.ruang}</td>
                <td>${jadwal.dosen}</td>
                <td>${jadwal.semester}</td>
            </tr>`;
        });
        $("#tabel_body").html(tableBody);
    }
</script>

@endsection