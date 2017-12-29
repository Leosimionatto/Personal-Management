@extends('usuario::layouts.login')

@section('content')
    <div class="center-page">
        <div class="card" style="width:700px;background:#fff;">
            <div class="padding-10 width-30 align-top inline-block" style="background:#428bca;height:350px">
                <div class="block padding-12 text-center">
                    <div class="circular-icon space-bottom-10">
                        <img src="{{ asset('img/personal-management-logo-option-2.png') }}" width="80%">
                    </div>

                    <h4 class="white">A dádiva de hábitos</h4>

                    <div class="social-icons space-top-10">
                        <div class="icon">
                            <i class="fa fa-facebook-official white"></i>
                        </div>
                        <div class="icon">
                            <i class="fa fa-twitter-square white"></i>
                        </div>
                        <div class="icon">
                            <i class="fa fa-youtube white"></i>
                        </div>
                        <div class="icon">
                            <i class="fa fa-instagram white"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="padding-12 width-70 inline-block align-top" style="margin-left:-3.5px;height:350px">
                <div class="card-header padding-4">
                    <i class="fa fa-key right" style="color:#428bca;font-size:18px"></i>
                    <h3>Personal <span style="color:#428bca;font-size:20px">Management</span> - Autenticação</h3>
                </div>
                <div class="card-body space-top-6">
                    <div class="padding-4">
                        <div class="space-bottom-6 space-top-2">
                            Uma ferramenta de Gerenciamento de Informações Pessoais de simples entendimento e com um forte poder de auxílio em suas atividades
                            diárias. Nunca foi tão fácil se auto-gerenciar.
                        </div>

                        @if(count($errors) > 0)
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger" style="display:block;padding:12px;margin-bottom:6px">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif

                        <form action="{{ url('usuario/login') }}" method="POST" class="login-form">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="email" style="font-size:15px">E-mail:</label>
                                <input type="text" name="email" class="form-control" placeholder="example@example.com.br" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label for="email" style="font-size:15px">Senha:</label>
                                <input type="password" name="senha" class="form-control" placeholder="example" value="{{ old('senha') }}">
                            </div>
                        </form>
                    </div>
                    
                    <div class="space-top-10 align-center">
                        <a href="" class="space-right-10 space-left-4 padding-4">
                            <i class="fa fa-question-circle" style="color:#428bca"></i> Esqueceu sua senha?
                        </a>
                        <button class="btn btn-primary call-confirm-modal right submit">Efetuar o login <i class="fa fa-user-circle white"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('usuario::login.javascript.index')
@endsection