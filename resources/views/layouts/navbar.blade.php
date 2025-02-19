    <!-- partial:partials/_navbar.html -->
    <nav class="navbar p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item dropdown">
                    <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                    <div class="navbar-profile">
                        <img class="img-xs rounded-circle" src="assets/images/stmik.png" alt="">
                        <p class="mb-0 d-none d-sm-block navbar-profile-name">Admin</p>
                        <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                    </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                    <h6 class="p-3 mb-0">Profile</h6>
                    <div class="dropdown-divider"></div>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item" id="logoutButton">
                        <div class="preview-thumbnail">
                        <div class="preview-icon bg-dark rounded-circle">
                            <i class="mdi mdi-logout text-danger"></i>
                        </div>
                        </div>
                        <div class="preview-item-content">
                        <p class="preview-subject mb-1">Log out</p>
                        </div>
                    </a>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-format-line-spacing"></span>
            </button>
        </div>
    </nav>
    <script>
        const urlLogout = 'v1/logout'
        $(document).ready(function() {
            $('#logoutButton').click(function(e) {
                Swal.fire({
                title: 'Yakin ingin keluar?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancel',
                resolveButton: true
                }).then((result) => {
                if (result.isConfirmed) {
                    e.preventDefault();
                    var loadingSwal = Swal.fire({
                    title: 'Loading...',
                    html: 'Please wait while processing...',
                    allowOutsideClick: false,
                    showCancelButton: false,
                    showConfirmButton: false,
                    onBeforeOpen: () => {
                        Swal.showLoading();
                    }
                    });
                    $.ajax({
                    url: `{{ url('${urlLogout}') }}`,
                    method: 'POST',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        loadingSwal.close();
                        window.location.href = '/login';
                    },
                    error: function(xhr, status, error) {
                        loadingSwal.close();
                        Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Failed to logout. Please try again.',
                        })
                    }
                    });
                }
                });
            });
        });
    </script>
