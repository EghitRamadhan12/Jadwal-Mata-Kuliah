import pengampuService from './pengampu.service.js';

$(document).ready(function() {
    const pengampuservice = new pengampuService();
    pengampuservice.getAllData();

    function validation () {
        $('#formTambah').validate({
            rules: {
                id_dosen: {
                    required: true
                },
                id_mk: {
                    required: true
                },
                id_kelas: {
                    required: true
                }
            },
            messages: {
                id_dosen: {
                    required: "Dosen harus diisi"
                },
                id_mk: {
                    required: "Mata kuliah harus diisi"
                },
                id_kelas: {
                    required: "Kelas harus diisi"
                }
            },
            highlight: function (element) {
            $(element).closest('.form-control').removeClass('is-valid').addClass('is-invalid');
            },
            success: function (label, element) {
            $(label).closest('.form-control').removeClass('is-invalid').addClass('is-valid');
            $(element).removeClass('is-invalid').addClass('is-valid');
            },
            errorPlacement: function (error, element) {
            error.addClass('text-warning');
            error.addClass('mt-2');
            error.addClass('text-sm');
            error.insertAfter(element);
            }
        });
    }

    validation();

    $('#id_dosen').on('input',  function() {
        $(this).valid();
    });
    $('#id_mk').on('input',  function() {
        $(this).valid();
    });
    $('#id_kelas').on('input',  function() {
        $(this).valid();
    });
    
    function checkingEdit() {
        return $('#id').val() ? true : false
    }

    $('#formTambah').submit(function(e) {
        e.preventDefault();
        pengampuservice.upsertData(e, checkingEdit);
    }); 

    $(document).on('click', '.edit-modal', function() {
        const id = $(this).data('id')
        pengampuservice.getDataById(id, checkingEdit)
    });

    $(document).on('click', '.delete-confirm', function() {
        const id = $(this).data('id')
        pengampuservice.deleteData(id)
    });

    $('#pengampuModal').on('hidden.bs.modal', function() {
        $('#id').val('');
        $('#id_dosen').val('');
        $('#id_mk').val('');
        $('#id_kelas').val('');
        $('#modal-title').text('Tambah Data')
        $('.form-control').removeClass('is-invalid').removeClass('is-valid')
        $('.error').remove();
    });

    $('#btnTambah').on('click', function() {
        $('#formTambah').trigger('reset');
        $('#id').val(''); 
        $('#modal-title').text('Tambah Data');
    });
    
});

