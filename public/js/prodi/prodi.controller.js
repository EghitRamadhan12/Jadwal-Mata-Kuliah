import prodiService from './prodi.service.js'

$(document).ready(function() {
    const prodiservice = new prodiService();
    prodiservice.getAllData();

    function validation () {
        $('formTambah').validate({
            rules: {
                nm_prodi: {
                    required: true,
                    unique: true
                }
            },
            messages: {
                nm_prodi: {
                    required: "Nama Prodi harus diisi",
                    unique: "Prodi sudah ada"
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
        })
    }

    validation();

    $('#nm_prodi').on('input', function() {
        $(this).valid()
    })

    function checkingEdit () {
        return $('#id').val() ? true :false
    }
    $('#formTambah').submit(function(e) {
        e.preventDefault();
        prodiservice.upsertData(e, checkingEdit);
    }); 

    $(document).on('click', '.edit-modal', function() {
        const id = $(this).data('id')
        prodiservice.getDataById(id, checkingEdit)
    });

    $(document).on('click', '.delete-confirm', function() {
        const id = $(this).data('id')
        prodiservice.deleteData(id)
    });

    $('#prodiModal').on('hidden.bs.modal', function() {
        $('#id').val('');
        $('#nm_prodi').val('');
        $('#modal-title').text('Tambah Data')
        $('.form-control').removeClass('is-invalid').removeClass('is-valid')
        $('.error').remove();
    });

    $('#btnTambah').on('click', function() {
        $('#formTambah').trigger('reset');
        $('#id').val('');
        $('#modal-title').text('Tambah Data'); 
    });

})