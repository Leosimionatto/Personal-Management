<!DOCTYPE html>
<html style="overflow-y:auto">
    <head>
        <meta charset="utf-8">
        <title>Personal Management</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
        <link rel='stylesheet' href='//fonts.googleapis.com/css?family=Roboto%3A300%2C400%7CRaleway%3A400%2C500%2C900&#038;ver=3.1' type='text/css' media='all'/>
    </head>
    <body>
        <div class="application-body-complete">
            @yield('content')
        </div>
    </body>

    <!-- Jquery include -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.js') }}"></script>

    @section('scripts')
    @show
</html>
