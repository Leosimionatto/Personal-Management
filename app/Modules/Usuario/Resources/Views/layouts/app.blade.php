<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Personal Management</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
        <link rel='stylesheet' href="{{ asset('js/fullcalendar/fullcalendar.css') }}">
        <link rel='stylesheet' href="{{ asset('js/multiple-select-master/multiple-select.css') }}">
        <link rel="stylesheet" href="{{ asset('summernote/summernote.css') }}">
        <link rel='stylesheet' href='//fonts.googleapis.com/css?family=Roboto%3A300%2C400%7CRaleway%3A400%2C500%2C900&#038;ver=3.1' type='text/css' media='all'/>
    </head>
    <body>
        <div class="application-menu">
            <span class="menu-title">
                Personal <span style="color:#86C543;font-size:16px">Management</span>
            </span>
            <div class="profile-configuration text-center">
                <img src="{{ asset('img/sem-foto.png') }}" width="90px">
                <div class="profile-options">
                    <span class="block name space-top-6"><a href="">{{ \Illuminate\Support\Facades\Auth::guard('user')->user()->nome }} <i class="fa fa-edit"></i></a></span>
                </div>
            </div>
            <div class="menu-actions">
                <ul>
                    <li><a href=""><i class="fa fa-home"></i> Página inicial</a></li>
                    <li><a href=""><i class="fa fa-cloud"></i> Feed de notícias</a></li>
                    <li><a href=""><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="{{ route('project.index') }}"><i class="fa fa-database"></i> Projetos</a></li>
                    <li><a href=""><i class="fa fa-group"></i> Tarefas</a></li>
                    <li><a href=""><i class="fa fa-bar-chart"></i> Estudos</a></li>
                    <li><a href=""><i class="fa fa-book"></i> Quadro de anotações</a></li>
                    <li><a href=""><i class="fa fa-calendar-check-o"></i> Compromissos</a></li>
                </ul>
            </div>
        </div>
        <div class="application-body">
            @yield('content')
        </div>
    </body>

    <!-- Jquery include -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.js') }}"></script>

    <!--  My jquery scripts  -->
    <script src="{{ asset('js/javascript/steps.js') }}"></script>
    <script src="{{ asset('js/javascript/functions.js') }}"></script>

    <!-- SummerNote -->
    <script src="{{ asset('summernote/summernote.js') }}"></script>

    <!--  Scripts  -->
    <script src="{{ asset('js/fullcalendar/lib/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/fullcalendar/fullcalendar.js') }}"></script>
    <script src="{{ asset('js/fullcalendar/locale/pt-br.js') }}"></script>
    <script src="{{ asset('js/multiple-select-master/multiple-select.js') }}"></script>

    @section('scripts')
    @show

</html>
