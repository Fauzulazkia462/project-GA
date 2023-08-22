<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Start your development with Rubic landing page.">
        <meta name="author" content="Devcrud">
        <title>Project GA</title>

        <link rel="stylesheet" href="{{ asset('vendors/themify-icons/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('css/rubic.css') }}">
        <script src="https://unpkg.com/jquery@2.2.4/dist/jquery.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

        {{-- Filter Tanggal --}}
        <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/date-1.1.2/r-2.3.0/datatables.min.css"/>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    </head>

    <body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
        @include('partials.header')

        @yield('content')

        @include('partials.footer')


        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"/>

        <script src="{{ asset('vendors/jquery/jquery-3.4.1.js') }}"></script>
        <script src="{{ asset('vendors/bootstrap/bootstrap.bundle.js') }}"></script>
        <script src="{{ asset('vendors/bootstrap/bootstrap.affix.js') }}"></script>
        <script src="{{ asset('js/rubic.js') }}"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/date-1.1.2/r-2.3.0/datatables.min.js"></script>
        @yield('script')
    </body>
</html>
