import ruangService from './ruang.service.js';

$(document).ready(function() {
    const ruangservice = new ruangService();
    ruangservice.getAllData();

    function validation () {
        $('#formTambah').validate({
            rules: {
                ruang: {
                    required: true,
                }
            },
            messages: {
                ruang: {
                    required: "Nama ruang harus diisi",
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

    $('#ruang').on('input',  function() {
        $(this).valid();
    });

    function checkingEdit() {
        return $('#id').val() ? true : false
    }

    $('#formTambah').submit(function(e) {
        e.preventDefault();
        ruangservice.upsertData(e, checkingEdit);
    }); 

    $(document).on('click', '.edit-modal', function() {
        const id = $(this).data('id')
        ruangservice.getDataById(id, checkingEdit)
    });

    $(document).on('click', '.delete-confirm', function() {
        const id = $(this).data('id')
        ruangservice.deleteData(id)
    });

    $('#ruangModal').on('hidden.bs.modal', function() {
        $('#id').val('');
        $('#ruang').val('');
        $('#modal-title').text('Tambah Data')
        $('.form-control').removeClass('is-invalid').removeClass('is-valid')
        $('.error').remove();
    });

    $('#btnTambah').on('click', function() {
        $('#formTambah').trigger('reset');
        $('#id').val(''); // Reset id
        $('#modal-title').text('Tambah Data'); // Ubah judul modal
    });

    
});

