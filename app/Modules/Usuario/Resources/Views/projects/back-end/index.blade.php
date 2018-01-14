@extends('usuario::layouts.app')

@section('content')
    <div class="projects">
        <div class="menu-top card padding-12 space-bottom-15 relative">
            <div class="block">
                <span class="available-route-option"><a href="{{ route('index') }}">Página inicial <i class="fa fa-arrow-right"></i></a></span>
                <span class="disabled-route-option">Projetos</span>
                <span class="right sign-out disabled-route-option">Sair <i class="fa fa-sign-out"></i></span>

                @include('usuario::layouts.notification')

                <span class="right disabled-route-option space-right-15">Personal Management</span>
            </div>
        </div>
        <div class="text-right">
            <button type="button" class="btn btn-warning left">Compromissos associados <i class="fa fa-calendar-check-o white"></i></button>
            <button type="button" class="btn btn-primary left space-left-6">Principais acontecimentos <i class="fa fa-calendar-check-o white"></i></button>
            <a href="{{ route('project.create') }}"><button type="button" class="btn btn-primary">Novo projeto <i class="fa fa-plus-circle white"></i></button></a>
        </div>
    </div>
@endsection