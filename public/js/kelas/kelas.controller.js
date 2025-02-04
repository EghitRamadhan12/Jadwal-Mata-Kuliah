import kelasService from './kelas.service.js'

$(document).ready(function() {
    const kelasservice = new kelasService();
    kelasservice.getAllData();

    function validation () {
        $('formTambah').validate({
            rules: {
                kelas: {
                    required: true,
                    unique: true
                }
            },
            messages: {
                kelas: {
                    required: "Kelas harus diisi",
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

    $('#kelas').on('input', function() {
        $(this).valid()
    })

    function checkingEdit () {
        return $('#id').val() ? true :false
    }
    $('#formTambah').submit(function(e) {
        e.preventDefault();
        kelasservice.upsertData(e, checkingEdit);
    }); 

    $(document).on('click', '.edit-modal', function() {
        const id = $(this).data('id')
        kelasservice.getDataById(id, checkingEdit)
    });

    $(document).on('click', '.delete-confirm', function() {
        const id = $(this).data('id')
        kelasservice.deleteData(id)
    });

    $('#prodiModal').on('hidden.bs.modal', function() {
        $('#id').val('');
        $('#kelas').val('');
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