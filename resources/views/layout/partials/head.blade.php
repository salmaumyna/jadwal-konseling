<!-- Bootstrap CSS -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ url('/assets/css/bootstrap.min.css') }}">
<script src="{{ url('/assets/js/bootstrap.min.js') }}"></script>

<!-- Fontawesome CSS -->
<link rel="stylesheet" href="{{ url('/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
<link rel="stylesheet" href="{{ url('/assets/plugins/fontawesome/css/all.min.css') }}">

<!-- Google font -->
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{ url('/assets/css/line-awesome.min.css') }}">
<link rel="stylesheet" href="{{ url('/assets/css/material.css') }}">
<!-- Select2 css -->
<link href="{{ url('/assets/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Datatable css -->
<link href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<!-- Datetimepicker CSS -->
<link href="{{ url('/assets/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Daterangepicker CSS -->
<link href="{{ url('/assets/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
<!-- BootstrapPicker CSS -->
<link href="{{ url('/assets/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ url('/assets/css/style.css') }}" rel="stylesheet" />

<style>
    * {
        font-family: 'Lato', sans-serif;
    }
</style>

<!-- Main CSS -->
@vite(['resources/scss/main.scss'])
