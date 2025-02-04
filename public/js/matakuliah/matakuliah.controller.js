import mataKuliahService from './matakuliah.service.js';

$(document).ready(function() {
    const matakuliahservice = new mataKuliahService();
    matakuliahservice.getAllData();

    function validation () {
        $('#formTambah').validate({
            rules: {
                id_prodi: {
                    required: true
                },
                mk: {
                    required: true
                },
                sks: {
                    required: true,
                    maxlength: 1
                }
            },
            messages: {
                id_prodi: {
                    required: "Prodi harus diisi"
                },
                mk: {
                    required: "Nama mata kuliah harus diisi"
                },
                sks: {
                    required: "SKS harus diisi",
                    maxlength: "Nilai diisi maximal 1 digit"
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

    $('#id_prodi').on('input',  function() {
        $(this).valid();
    });
    
    $('#mk').on('input',  function() {
        $(this).valid();
    });
    
    $('#sks').on('input',  function() {
        $(this).valid();
    });

    function checkingEdit() {
        return $('#id').val() ? true : false
    }

    $('#formTambah').submit(function(e) {
        e.preventDefault();
        matakuliahservice.upsertData(e, checkingEdit);
    }); 

    $(document).on('click', '.edit-modal', function() {
        const id = $(this).data('id')
        matakuliahservice.getDataById(id, checkingEdit)
    });

    $(document).on('click', '.delete-confirm', function() {
        const id = $(this).data('id')
        matakuliahservice.deleteData(id)
    });

    $('#mataKuliahModal').on('hidden.bs.modal', function() {
        $('#id').val('');
        $('#id_prodi').val('');
        $('#mk').val('');
        $('#sks').val('');
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

