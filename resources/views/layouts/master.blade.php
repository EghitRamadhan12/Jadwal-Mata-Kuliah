<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">   
    <title>STMIK Adhi Guna</title>
    @include('layouts.style')
    <script>
        let appUrl = "{{ env('APP_URL') }}";
    </script>
</head>
<body>
    <div class="container-scroller">
        @include('layouts.sidebar')
        <div class="container-fluid page-body-wrapper">
        @include('layouts.navbar')
                <!-- partial -->
    <div class="main-panel">
        @yield('content')
        
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        {{-- <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
            </div>
        </footer> --}}
        <!-- partial -->
        </div>
        <!-- main-panel ends -->
        </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('layouts.scripts')
</body>
</html>