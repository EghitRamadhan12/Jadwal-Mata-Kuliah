import semesterService from './semester.service.js';

$(document).ready(function() {
    const semesterservice = new semesterService();
    semesterservice.getAllData();

    function validation () {
        $('#formTambah').validate({
            rules: {
                semester: {
                    required: true
                },
                tgl_mulai: {
                    required: true
                },
                tgl_selesai: {
                    required: true,
                }
            },
            messages: {
                semester: {
                    required: "Semester tidak boleh kosong"
                },
                tgl_mulai: {
                    required: "Tanggal mulai tidak boleh kososng"
                },
                tgl_selesai: {
                    required: "Tanggal selesai tidak boleh kosong",
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

    $('#semester').on('input',  function() {
        $(this).valid();
    });
    
    $('#tgl_mulai').on('input',  function() {
        $(this).valid();
    });
    $('#tgl_selesai').on('input',  function() {
        $(this).valid();
    });

    function checkingEdit() {
        return $('#id').val() ? true : false
    }

    $('#formTambah').submit(function(e) {
        e.preventDefault();
        semesterservice.upsertData(e, checkingEdit);
    }); 

    $(document).on('click', '.edit-modal', function() {
        const id = $(this).data('id')
        semesterservice.getDataById(id, checkingEdit)
    });

    $(document).on('click', '.delete-confirm', function() {
        const id = $(this).data('id')
        semesterservice.deleteData(id)
    });

    $('#semesterModal').on('hidden.bs.modal', function() {
        $('#id').val('');
        $('#semester').val('');
        $('#tgl_mulai').val('');
        $('#tgl_selesai').val('');
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

