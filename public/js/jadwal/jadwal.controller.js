import jadwalService from './jadwal.service.js';

$(document).ready(function() {
    const jadwalservice = new jadwalService();
    jadwalservice.getAllData();

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
            },
            id_ruang: {
                required: true
            },
            id_semester: {
                required: true
            },
            hari : {
                required: true
            },
            jam_mulai: {
                required: true
            },
            jam_selesai: {
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
            },
            id_ruang: {
                required: "Ruang harus diisi"
            },
            id_semester: {
                required: "Semester harus diisi"
            },
            hari : {
                required: "Hari harus diisi"
            },
            jam_mulai: {
                required: "Jam mulai harus diisi"
            },
            jam_selesai: {
                required: "Jam selesai harus diisi"
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
    $('#id_ruang').on('input',  function() {
        $(this).valid();
    });
    $('#id_semester').on('input',  function() {
        $(this).valid();
    });
    
    function checkingEdit() {
        return $('#id').val() ? true : false
    }

    $('#formTambah').submit(function(e) {
        e.preventDefault();
        jadwalservice.upsertData(e, checkingEdit);
    }); 

    $(document).on('click', '.edit-modal', function() {
        const id = $(this).data('id')
        jadwalservice.getDataById(id, checkingEdit)
    });

    $(document).on('click', '.delete-confirm', function() {
        const id = $(this).data('id')
        jadwalservice.deleteData(id)
    });

    $('#mataKuliahModal').on('hidden.bs.modal', function() {
        $('#id').val('');
        $('#id_dosen').val('');
        $('#id_mk').val('');
        $('#id_kelas').val('');
        $('#id_ruang').val('');
        $('#id_semester').val('');
        $('#hari').val('');
        $('#jam_mulai').val('');
        $('#jam_selesai').val('');
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

