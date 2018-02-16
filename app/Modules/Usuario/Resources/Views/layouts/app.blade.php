<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Personal Management</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
        <link rel='stylesheet' href="{{ asset('js/fullcalendar/fullcalendar.css') }}">
        <link rel='stylesheet' href="{{ asset('js/multiple-select-master/multiple-select.css') }}">
        <link rel="stylesheet" href="{{ asset('summernote/summernote.css') }}">
        <link rel="stylesheet" href="{{ asset('c3/c3.css') }}">
        <link rel='stylesheet' href='//fonts.googleapis.com/css?family=Roboto%3A300%2C400%7CRaleway%3A400%2C500%2C900&#038;ver=3.1' type='text/css' media='all'/>
    </head>
    <body>
        <div class="loader-background" style="display:none">
            <figure class="text-center">
                <img src="{{ asset('img/personal-management-loader.gif') }}" width="80px">
                <figcaption style="margin-top:-6px;"><b style="color:rgba(33, 77, 115, 1)">Aguarde um momento...</b></figcaption>
            </figure>
        </div>

        <div class="application-menu-mobile">
            <span class="menu-title">
                Personal <span class="space-left-4" style="color:#86C543;font-size:16px">Management</span>
            </span>

            <div class="menu-actions">
                <ul>
                    <a href="" data-toggle="tooltip" data-placement="bottom" title="Página inicial"><li><i class="fa fa-home"></i></li></a>
                    <a href="" data-toggle="tooltip" data-placement="bottom" title="Feed de notícias"><li><i class="fa fa-cloud"></i></li></a>
                    <a href="" data-toggle="tooltip" data-placement="bottom" title="Dashboard"><li><i class="fa fa-dashboard"></i></li></a>
                    <a href="{{ route('project.index') }}" data-toggle="tooltip" data-placement="bottom" title="Projetos"><li><i class="fa fa-database"></i></li></a>
                    <a href="" data-toggle="tooltip" data-placement="bottom" title="Tarefas"><li><i class="fa fa-group"></i></li></a>
                    <a href="" data-toggle="tooltip" data-placement="bottom" title="Estudos"><li><i class="fa fa-bar-chart"></i></li></a>
                    <a href="" data-toggle="tooltip" data-placement="bottom" title="Quadro de anotações"><li><i class="fa fa-book"></i></li></a>
                    <a href="" data-toggle="tooltip" data-placement="bottom" title="Compromissos"><li><i class="fa fa-calendar-check-o"></i></li></a>
                </ul>
            </div>
        </div>

        <div class="application-menu">
            <span class="menu-title">
                Personal <span style="color:#86C543;font-size:18px">Management</span>
            </span>
            <div class="profile-configuration text-center">
                <img src="{{ asset('img/sem-foto.png') }}" width="90px">
                <div class="profile-options">
                    <span class="block name space-top-6"><a href="">{{ \Illuminate\Support\Facades\Auth::guard('user')->user()->nome }} <i class="fa fa-user-circle"></i></a></span>
                </div>
            </div>
            <div class="menu-actions">
                <ul>
                    <a href=""><li><i class="fa fa-home"></i> Página inicial</li></a>
                    <a href=""><li><i class="fa fa-cloud"></i> Feed de notícias</li></a>
                    <a href=""><li><i class="fa fa-dashboard"></i> Dashboard</li></a>
                    <a href="{{ route('project.index') }}"><li><i class="fa fa-database"></i> Projetos</li></a>
                    <a href=""><li><i class="fa fa-group"></i> Tarefas</li></a>
                    <a href=""><li><i class="fa fa-bar-chart"></i> Estudos</li></a>
                    <a href=""><li><i class="fa fa-book"></i> Quadro de anotações</li></a>
                    <a href=""><li><i class="fa fa-calendar-check-o"></i> Compromissos</li></a>
                </ul>
            </div>
        </div>
        <div class="application-body">
            <!-- Application Content -->
            @yield('content')
        </div>
        <div class="application-chat-open-button open-chat" data-toggle="tooltip" data-placement="left" title="Sistema de Chat" id="application">
            <i class="fa fa-envelope-square"></i>
        </div>
    </body>

    <!-- Laravel JS file -->
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

    <!-- Jquery include -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.js') }}"></script>

    <!--  My jquery scripts  -->
    <script src="{{ asset('js/javascript/steps.js') }}"></script>
    <script src="{{ asset('js/javascript/setup.js') }}"></script>

    <!-- SummerNote -->
    <script src="{{ asset('summernote/summernote.js') }}"></script>

    <!--  Scripts  -->
    <script src="{{ asset('js/fullcalendar/lib/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/fullcalendar/fullcalendar.js') }}"></script>
    <script src="{{ asset('js/fullcalendar/locale/pt-br.js') }}"></script>
    <script src="{{ asset('js/multiple-select-master/multiple-select.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="http://d3js.org/d3.v3.min.js"></script>
    <script src="{{ asset('c3/c3.min.js') }}"></script>
    <script src="{{ asset('js/jquery-mask/jquery.mask.js')  }}"></script>

    @include('usuario::layouts.javascript.notification')
    @include('usuario::layouts.chat')

    @section('scripts')
    @show

</html>
