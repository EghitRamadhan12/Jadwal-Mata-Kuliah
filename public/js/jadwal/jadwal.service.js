class jadwalService {
    ajaxRequest(url, method, data = null) {
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

    async getAllData() {
        if ($.fn.dataTable.isDataTable('#dataTable')) {
            $('#dataTable').DataTable().clear().destroy();
        }

        $("#dataTable tbody").empty();

        try {
            const dosenResponse = await this.ajaxRequest(`${appUrl}/v1/dosen/`, `GET`);
            const dosenData = dosenResponse.data;
            this.populateProdiDropdown(dosenData);

            const mataKuliahResponse = await this.ajaxRequest(`${appUrl}/v1/mata-kuliah/`, `Get`)
            const matakuliahData = mataKuliahResponse.data;
            this.populateMataKuliahDropdown(matakuliahData);
            // this.populateSksByMataKuliah(matakuliahData);

            const kelasResponse = await this.ajaxRequest(`${appUrl}/v1/kelas/`, `Get`)
            const kelasData = kelasResponse.data;
            this.populateKelasDropdown(kelasData);

            const ruangResponse = await this.ajaxRequest(`${appUrl}/v1/ruang/`, `Get`)
            const ruangData = ruangResponse.data;
            this.populateRuangDropdown(ruangData);

            const semesterResponse = await this.ajaxRequest(`${appUrl}/v1/semester/`, `Get`)
            const semesterData = semesterResponse.data;
            this.populateSemesterDropdown(semesterData);

            const responseData = await this.ajaxRequest(`${appUrl}/v1/jadwal/`, 'GET');
            console.log(responseData, "response :");

            if (responseData && responseData.data) {
                let tableBody = '';
                responseData.data.forEach((item, index) => {
                    tableBody += `
                    <tr> 
                        <td>${index + 1}</td>
                        <td>${item.mata_kuliah.mk}</td>
                        <td>${item.mata_kuliah.sks}</td>
                        <td>${item.kelas.kelas}</td>
                        <td>${item.dosen.dosen}</td>
                        <td>${item.ruang.ruang}</td>
                        <td>${item.semester.semester}</td>
                        <td>${item.hari}</td>
                        <td>${item.jam_mulai}</td>
                        <td>${item.jam_selesai}</td>
                        <td class="text-center">
                            <button class="btn btn-outline-primary btn-sm edit-modal mr-1" data-toggle="modal" data-target="#jadwalModal" data-id="${item.id}">
                                <span class="mdi mdi-pencil"></span>
                            </button>
                            <button type="button" class="delete-confirm btn btn-outline-danger btn-sm" data-id="${item.id}">
                                <span class="mdi mdi-trash-can"></span>
                            </button>
                        </td>
                    </tr>
                    `;
                });

                $("#dataTable tbody").html(tableBody);

                $('#dataTable').DataTable({
                    paging: true,
                    searching: true,
                    responsive: true,
                    order: [[0, 'asc']],
                    pageLength: 5,
                    lengthMenu: [[5, 10, 25, 50, 100], [5, 10, 25, 50, 100]],
                    dom: '<"d-flex justify-content-between align-items-center"lf>tip',
                    language: {
                        paginate: {
                            previous: "Kembali",
                            next: "Lanjut"
                        },
                        lengthMenu: "Tampilkan _MENU_ catatan perhalaman",
                        zeroRecords: "Maaf data kosong - ",
                        info: "Menampilkan halaman _PAGE_ dari _PAGES_ pada _MAX_ entri",
                        infoEmpty: "Tidak ada catatan yang disimpan",
                        infoFiltered: "filtered from _MAX_ total records"
                    },
                    drawCallback: function(settings) {
                        $('.dataTables_paginate').addClass('d-flex gap-4 ms-auto');
                        $('.dataTables_info').addClass('mt-3');
                        
                        if (settings._iDisplayStart === 0) {
                            $('.paginate_button.previous').hide();
                        } else {
                            $('.paginate_button.previous').show();
                        }
                    }
                });
            } else {
                console.error('Response data is invalid:', responseData);
            }
        } catch (error) {
            console.error('Error fetching data:', error);
        }
    }

    populateProdiDropdown(dosenData){
        const dosenSelect = $('#id_dosen');
        dosenSelect.empty();
        dosenSelect.append('<option value="" selected disabled hidden >- pilih -</option>');

        $.each(dosenData, function(index, dosen) {
            dosenSelect.append(`<option value="${dosen.id}">${dosen.dosen}</option>`);
        });

    }

    // populateSksByMataKuliah(matakuliahData) {
    //     $('#id_mk').on('change', function() {
    //         let selectedId = $(this).val(); // Ambil ID MK yang dipilih
    //         let selectedMataKuliah = matakuliahData.find(mk => mk.id == selectedId);
            
    //         if (selectedMataKuliah) {
    //             $('#id_sks').val(selectedMataKuliah.sks); // Isi otomatis input SKS
    //         } else {
    //             $('#id_sks').val(''); // Kosongkan jika tidak ditemukan
    //         }
    //     });
    // }

    populateMataKuliahDropdown(matakuliahData) {
        const mkSelect = $('#id_mk');
        mkSelect.empty();
        mkSelect.append('<option value="" selected disabled hidden >- pilih -</option>')
    
        $.each(matakuliahData, function(index, mataKuliah) {
            mkSelect.append(`<option value="${mataKuliah.id}">${mataKuliah.mk}  - ${mataKuliah.sks} SKS</option>`);
        });
    }
    
    populateKelasDropdown(kelasData) {
        const kelasSelect = $('#id_kelas');
        kelasSelect.empty();
        kelasSelect.append('<option value="" selected disabled hidden >- pilih -</option>')

        $.each(kelasData, function(index, kelas) {
            kelasSelect.append(`<option value="${kelas.id}">${kelas.kelas}</option>`);
        });
    }
    
    populateRuangDropdown(ruangData) {
        const ruangSelect = $('#id_ruang');
        ruangSelect.empty();
        ruangSelect.append('<option value="" selected disabled hidden >- pilih -</option>');
        
        $.each(ruangData, function(index, ruang) {
            ruangSelect.append(`<option value="${ruang.id}">${ruang.ruang}</option>`);
        });
    }
    
    populateSemesterDropdown(semesterData) {
        const semesterSelect = $('#id_semester');
        semesterSelect.empty();
        semesterSelect.append('<option value="" selected disabled hidden >- pilih -</option>');
        
        $.each(semesterData, function(index, semester) {
            semesterSelect.append(`<option value="${semester.id}">${semester.semester}</option>`);
        });
    }

    async upsertData(e, checkingEdit) {
        let submitButton = $(e.target).find(':submit');
        const isEditMode = checkingEdit(); 
        try {
            const formData = new FormData(e.target);

            if (isEditMode) {
                const id = $('#id').val();
                const responseData = await this.ajaxRequest(`${appUrl}/v1/jadwal/update/${id}`, 'POST', formData);
                console.log(responseData);
                if (responseData.status === 'success') {
                    successUpdateAlert().then(() => {
                        reloadBrowser();
                        $('#dosenModal').modal('hide');
                    });
                } else if (responseData.code === 422) {
                    warningAlert();
                } else {
                    errorAlert();
                }
            } else {
                submitButton.attr('disabled', true);
                const responseData = await this.ajaxRequest(`${appUrl}/v1/jadwal/create`, 'POST', formData);
                console.log(responseData);
                if (responseData.status === 'success') {
                    successCreateAlert().then(() => {
                        reloadBrowser();
                        $('#dosenModal').modal('hide');
                    });
                } else {
                    errorAlert()
                }
            }
        } catch (error) {
            submitButton.attr('disabled', false);
            console.error('Error:', error);
            if (error.status && error.status === 422) {
                warningAlert()
            } else {
                errorAlert()
            }
        }
    }

    async getDataById(id, checkingEdit) {
        try {
            const responseData = await this.ajaxRequest(`${appUrl}/v1/jadwal/get/${id}`, 'GET');
            console.log(checkingEdit())
            $('#modal-title').html('Edit Data')
            $('#id').val(responseData.data.id);
            $('#id_dosen').val(responseData.data.id_dosen);
            $('#id_').val(responseData.data.id_sks);
            $('#id_mk').val(responseData.data.id_mk);
            $('#id_kelas').val(responseData.data.id_kelas);
            $('#id_ruang').val(responseData.data.id_ruang);
            $('#id_semester').val(responseData.data.id_semester);
            $('#hari').val(responseData.data.hari);
            $('#jam_mulai').val(responseData.data.jam_mulai);
            $('#jam_selesai').val(responseData.data.jam_selesai);
            checkingEdit();
        } catch (error) {
            console.log(error);
        }
    }

    async deleteData(id) {
        try {
            const result = await confirmDeleteAlert(); 
            if (result.isConfirmed) {
                const responseData = await this.ajaxRequest(`${appUrl}/v1/jadwal/delete/${id}`, 'DELETE');
                console.log(responseData);
                if (responseData.status === 'success') {
                    await successDeleteAlert().then(() => {
                        reloadBrowser();
                    });
                } else {
                    errorAlert();
                }
            } else {
                cancelDelete();
            }
        } catch (error) {
            console.error('Error:', error);
        }
    }
}

export default jadwalService;