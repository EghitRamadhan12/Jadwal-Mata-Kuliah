class dosenService {
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
            const responseData = await this.ajaxRequest(`${appUrl}/v1/dosen/`, 'GET');
            console.log(responseData, "response :");

            if (responseData && responseData.data) {
                let tableBody = '';
                responseData.data.forEach((item, index) => {
                    tableBody += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${item.dosen}</td>
                        <td>${item.jabatan}</td>
                        <td>${item.no_telp}</td>
                        <td class="text-center">
                            <button class="btn btn-outline-primary btn-sm edit-modal mr-1" data-toggle="modal" data-target="#dosenModal" data-id="${item.id}">
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
                        
                        // Hide 'previous' button on the first page
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

    async upsertData(e, checkingEdit) {
        let submitButton = $(e.target).find(':submit');
        const isEditMode = checkingEdit(); 
        try {
            const formData = new FormData(e.target);

            if (isEditMode) {
                const id = $('#id').val();
                const responseData = await this.ajaxRequest(`${appUrl}/v1/dosen/update/${id}`, 'POST', formData);
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
                const responseData = await this.ajaxRequest(`${appUrl}/v1/dosen/create`, 'POST', formData);
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
            // if (error.status && error.status === 422) {
            //     warningAlert();
            // } else if (error.responseJSON && error.responseJSON.status === 'not validate' && error.responseJSON.code === 422) {
            //     warningAlert()
            // } else if (error.status && error.status >= 500) {
            //     errorAlert();
            // } else if(error.status == 400){
            //     warningAlert()
            // } else{
            //     errorAlert()
            // }
            if (error.status && error.status === 422) {
                warningAlert()
            } else {
                errorAlert()
            }
        }
    }

    async getDataById(id, checkingEdit) {
        try {
            const responseData = await this.ajaxRequest(`${appUrl}/v1/dosen/get/${id}`, 'GET');
            console.log(checkingEdit())
            $('#modal-title').html('Edit Data')
            $('#id').val(responseData.data.id);
            $('#dosen').val(responseData.data.dosen);
            $('#jabatan').val(responseData.data.jabatan);
            $('#no_telp').val(responseData.data.no_telp);
            checkingEdit();
        } catch (error) {
            console.log(error);
        }
    }

    async deleteData(id) {
        try {
            const result = await confirmDeleteAlert(); 
            if (result.isConfirmed) {
                const responseData = await this.ajaxRequest(`${appUrl}/v1/dosen/delete/${id}`, 'DELETE');
                console.log(responseData);
                if (responseData.status === 'success') {
                    await successDeleteAlert().then(() => {
                        reloadBrowser();
                    });
                } else {
                    errorAlert();
                }
            }
        } catch (error) {
            console.error('Error:', error);
        }
    }
}

export default dosenService;