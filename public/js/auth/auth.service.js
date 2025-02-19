class authService {
    async ajaxRequest(url, method, formData) {
        try {
            const response = await $.ajax({
                url: url,
                type: method,
                data: formData,
                processData: false,
                contentType: false
            });
            return response;
        } catch (jqXHR) {
            throw {
                status: jqXHR.status,
                responseJSON: jqXHR.responseJSON || {}
            };
        }
    }

    async login(e) {
        try {
            Swal.fire({
                title: 'Loading...',
                html: 'Please wait while processing...',
                allowOutsideClick: false,
                showCancelButton: false,
                showConfirmButton: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            const formData = new FormData(e.target);
            const responseData = await this.ajaxRequest(`${appUrl}/v1/login`, 'POST', formData);
            console.log(responseData);

            if (responseData.status === 'success') {
                Swal.close();
                successLogin().then(() => {
                    window.location.href = `${appUrl}/`;
                });
            }
        } catch (error) {
            Swal.close();
            console.error('Error:', error);
            if (error.status === 401) {
                wrongAlert();
            } else if (error.status === 422) {
                warningAlert();
            } else {
                errorAlert();
            }
        }
    }
}

export default authService;