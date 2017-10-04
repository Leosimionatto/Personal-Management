@extends('usuarios::layouts.app')

@section('content')
    <div class="new-project">
        <div class="menu-top card padding-12 space-bottom-15 relative">
            <div class="block">
                <span class="available-route-option"><a href="">Página inicial <i class="fa fa-arrow-right"></i></a></span>
                <span class="available-route-option"><a href="{{ route('projects.index') }}">Projetos <i class="fa fa-arrow-right"></i></a></span>
                <span class="disabled-route-option">Novo projeto</span>
                <span class="right sign-out disabled-route-option">Sair <i class="fa fa-sign-out"></i></span>
                <div class="dropdown notifications right space-right-15">
                    <div class="notifications-information">
                        <label class="label label-danger">10</label>
                        <i class="fa fa-bell"></i>
                    </div>
                    <ul class="dropdown-menu">
                        <li><b>Status Atualizações</b></li>
                        <li class="divider"></li>
                        <li>Nenhuma notificação recente</li>
                    </ul>
                </div>
                <span class="right disabled-route-option space-right-15">Personal Management</span>
            </div>
        </div>
        <div class="actions space-bottom-15">
            <button class="btn btn-warning">Verificar disponibilidade <i class="fa fa-calendar-check-o white"></i></button>
        </div>
        <div class="card padding-12 new-project-form">
            <div class="top-title">
                <h3>Cadastro de um novo projeto:</h3>
                Para efetuar o cadastro de um novo projeto basta preencher as informações abaixo e clicar em <b>Criar projeto</b>.
            </div>
            <div class="steps" data-href="{{ url('usuarios/projetos/adicionar-projeto') }}">
                <div class="alert alert-danger insert-errors-alert" style="margin-bottom:10px;margin-top:15px">
                    <b style="font-size:14px">Oops! Encontramos alguns problemas:</b>
                    <span class="block space-top-2">Para prosseguir e completar esse cadastro, será necessário arrumar os seguintes erros:</span>
                    <ul class="insert-errors" style="padding-left:15px;padding-top:2px"></ul>
                </div>
                <form method="post">
                    <h4>Informações gerais</h4>

                    <div class="form-group">
                        <label for="nome" class="form-label">Qual o nome do projeto?</label>
                        <input type="text" class="form-control required" name="nome" placeholder="Nome do projeto" id="nome">
                    </div>
                    <div class="form-group">
                        <label for="tipo_projeto" class="form-label">Qual o tipo do projeto?</label>
                        <select class="form-control required" name="tipo_projeto" id="tipo_projeto">
                            <option value="-1" selected>Selecione uma opção</option>
                            <optgroup label="Desenvolvimento">
                                <option value="1">Criar um site</option>
                                <option value="2">Criar um aplicativo mobile</option>
                            </optgroup>
                            <optgroup label="Design">
                                <option value="3">Criar um template</option>
                                <option value="4">Fazer o mockup de um site</option>
                                <option value="5">Fazer o design de um banner</option>
                                <option value="6">Fazer o design de um logotipo</option>
                                <option value="7">Fazer o protótipo de uma aplicação</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tecnologias" class="form-label">Tecnologias que serão utilizadas?</label>
                        <select name="tecnologias" class="required" id="tecnologias" multiple="multiple">
                            <option value="1">Zend Framework 2</option>
                            <option value="2">Laravel 5.4</option>
                            <option value="3">HTML5</option>
                            <option value="4">CSS3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="descricao" class="form-label">Qual a descrição do projeto?</label>
                        <textarea class="form-control form-textarea required" name="descricao" id="descricao" placeholder="Descrição de habilidades necessárias para a participação no projeto"></textarea>
                    </div>
                </form>
                <form method="post">
                    <h4>Informações gerais</h4>

                    <div class="form-group">
                        <label for="participantes" class="form-label">Quais os participantes?</label>
                        <input type="text" class="form-control required" name="participantes" id="participantes" placeholder="Participantes?">
                    </div>
                    <div class="form-group" style="width:80%">
                        <label for="prioridade" class="form-label">Qual a prioridade do projeto?</label>
                        Esta é uma configuração muito importante no projeto, pois é este passo que definirá os avisos/alertas que serão enviados
                        para o proprietário do projeto. Então, lembre-se de sempre prestar muita atenção.
                        <div class="table space-top-10">
                            <div class="table-row">
                                <div class="table-cell width-10">
                                    <input type="radio" value="1" name="prioridade" id="prioridade" checked>
                                </div>
                                <div class="table-cell width-20">
                                    <label class="label label-primary">Indefinida</label>
                                </div>
                                <div class="table-cell" style="padding-left:20px">
                                    São os casos onde o projeto tem prioridade <b>Indefinida</b>.
                                </div>
                            </div>
                            <div class="table-row">
                                <div class="table-cell width-10">
                                    <input type="radio" value="2" name="prioridade" id="prioridade">
                                </div>
                                <div class="table-cell width-20">
                                    <label class="label label-success">Mínima</label>
                                </div>
                                <div class="table-cell" style="padding-left:20px">
                                    São os casos onde o projeto tem prioridade <b>mínima</b>.
                                </div>
                            </div>
                            <div class="table-row">
                                <div class="table-cell width-10">
                                    <input type="radio" value="3" name="prioridade" id="prioridade">
                                </div>
                                <div class="table-cell width-20">
                                    <label class="label label-warning">Média</label>
                                </div>
                                <div class="table-cell" style="padding-left:20px">
                                    São os casos onde o projeto tem prioridade <b>média</b>.
                                </div>
                            </div>
                            <div class="table-row">
                                <div class="table-cell width-10">
                                    <input type="radio" value="4" name="prioridade" id="prioridade">
                                </div>
                                <div class="table-cell width-20">
                                    <label class="label label-danger">Máxima</label>
                                </div>
                                <div class="table-cell" style="padding-left:20px">
                                    São os casos onde o projeto tem prioridade <b>máxima</b>.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dtentrega" class="form-label">Qual a data de término?</label>
                        <input type="date" class="form-control required" name="dtentrega" id="dtentrega">
                    </div>
                    <div class="form-group space-bottom-10" style="width:80%">
                        <label for="project-aditional-options" class="form-label">Opções auxiliares adicionais</label>
                        Estes são alguns recursos opcionais e adicionais fornecidos pelo sistema para lhe auxiliar com o processo inicial de seus projetos, de forma a facilitar
                        algumas tarefas que seriam necessárias. <br>
                        <input type="checkbox" name="alert"> Alertar participantes por e-mail <br>
                        <input type="checkbox" name="alert"> Habilitar repositório na aplicação
                    </div>

                    <input type="hidden" name="idusuario" value="1">
                    <input type="hidden" name="situacao" value="1">
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('usuarios::projects.javascript.new-project')
@endsection