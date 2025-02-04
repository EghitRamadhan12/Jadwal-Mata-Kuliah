import dosenService from './dosen.service.js';

$(document).ready(function() {
    const dosenservice = new dosenService();
    dosenservice.getAllData();

    function validation () {
        $('#formTambah').validate({
            rules: {
                dosen: {
                    required: true
                },
                jabatan: {
                    required: true
                },
                no_telp: {
                    required: true,
                    minlength: 12,
                    maxlength: 13
                }
            },
            messages: {
                dosen: {
                    required: "Nama dosen harus diisi"
                },
                jabatan: {
                    required: "Jabatan dosen harus diisi"
                },
                no_telp: {
                    required: "Nomor telepon harus diisi",
                    number: "Nomor telepon harus berupa angka",
                    minlength: "Nomor telepon minimal 12 karakter",
                    maxlength: "Nomor telepon maksimal 13 karakter"
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

    $('#dosen').on('input',  function() {
        $(this).valid();
    });
    
    $('#jabatan').on('input',  function() {
        $(this).valid();
    });
    $('#no_telp').on('input',  function() {
        $(this).valid();
    });

    function checkingEdit() {
        return $('#id').val() ? true : false
    }

    $('#formTambah').submit(function(e) {
        e.preventDefault();
        dosenservice.upsertData(e, checkingEdit);
    }); 

    $(document).on('click', '.edit-modal', function() {
        const id = $(this).data('id')
        dosenservice.getDataById(id, checkingEdit)
    });

    $(document).on('click', '.delete-confirm', function() {
        const id = $(this).data('id')
        dosenservice.deleteData(id)
    });

    $('#dosenModal').on('hidden.bs.modal', function() {
        $('#id').val('');
        $('#dosen').val('');
        $('#jabatan').val('');
        $('#no_telp').val('');
        $('#modal-title').text('Tambah Data')
        $('.form-control').removeClass('is-invalid').removeClass('is-valid')
        $('.error').remove();
    });
    // $('#dosenModal').on('hidden.bs.modal', function() {
    //     $('#formTambah').trigger('reset'); // Reset seluruh form
    //     $('#id').val(''); // Kosongkan id agar form kembali ke mode tambah
    //     $('.form-control').removeClass('is-invalid is-valid'); // Hapus validasi tampilan
    //     $('.error').remove(); // Hapus pesan error jika ada
    // });

    $('#btnTambah').on('click', function() {
        $('#formTambah').trigger('reset');
        $('#id').val(''); // Reset id
        $('#modal-title').text('Tambah Data'); // Ubah judul modal
    });

    
});

