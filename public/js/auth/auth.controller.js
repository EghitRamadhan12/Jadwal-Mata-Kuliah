import authService from "./auth.service.js";


$(document).ready(function () {
    const authservice = new authService()

    function validation() {
        $('#loginForm').validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true
                }
            },
            messages: {
                email: {
                    required: "Email tidak boleh kosong",
                    email: "Format email tidak valid"
                },
                password: {
                    required: "password tidak boleh kosong"
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
                error.addClass('text-danger');
                error.addClass('text-sm')
                error.insertAfter(element);
            }
        });
    }

    validation()

    $('#email, #password').on('input', function () {
        $(this).valid()
    })

    $("#loginForm").submit(function (e) {
        e.preventDefault();
        authservice.login(e)
    })
});