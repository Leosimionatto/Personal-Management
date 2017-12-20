@extends('usuario::layouts.app')

@section('content')
    <div class="new-project">
        <div class="menu-top card padding-12 space-bottom-15 relative">
            <div class="block">
                <span class="available-route-option"><a href="">Página inicial <i class="fa fa-arrow-right"></i></a></span>
                <span class="available-route-option"><a href="{{ route('project.index') }}">Projetos <i class="fa fa-arrow-right"></i></a></span>
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

            <div class="steps" data-href="{{ url('usuario/projeto/cadastrar') }}">
                <div class="alert alert-danger insert-errors-alert space-bottom-10 space-top-15">
                    <b style="font-size:14px">Oops! Encontramos alguns problemas:</b>
                    <span class="block space-top-2">
                        Para prosseguir e completar esse cadastro, será necessário corrigir os seguintes erros:
                    </span>
                    <ul class="insert-errors" style="padding-left:15px;padding-top:2px"></ul>
                </div>

                <form method="post">
                    <h4>Informações gerais</h4>

                    <div class="form-group">
                        <label for="nome" class="form-label">Qual o nome do projeto?</label>
                        <input type="text" class="form-control required" name="nmprojeto" placeholder="Nome do projeto" id="nome">
                    </div>

                    <div class="form-group">
                        <label for="tipo_projeto" class="form-label">Qual o tipo do projeto?</label>
                        <select class="form-control required" name="idtpprojeto" id="tipo_projeto">
                            <option value="-1" selected disabled>Selecione uma opção</option>
                            @foreach($types as $type)
                                <option value="{{ $type['id'] }}">{{ $type['nmtipo'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tecnologias" class="form-label">Tecnologias que serão utilizadas?</label>
                        <select name="tecnologias" class="required-multiple-select" id="tecnologias" multiple="multiple">
                            @foreach($technologies as $technology)
                                <option value="{{ $technology['id'] }}">{{ $technology['nome'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="descricao" class="form-label">Qual a descrição do projeto?</label>
                        <textarea class="form-control form-textarea summernote required-summernote" name="descricao" id="descricao" placeholder="Descrição de habilidades necessárias para a participação no projeto"></textarea>
                    </div>
                </form>
                <form method="post">
                    <h4>Informações gerais</h4>

                    <label for="participantes" class="form-label">Quais os participantes?</label>
                    <div class="form-group input-group table space-bottom-4">
                        <input type="text" class="form-control required participant" name="participantes" id="participantes" placeholder="Participantes?">
                        <div class="input-group-addon add-participant"><i class="fa fa-user-plus"></i></div>
                    </div>

                    <div class="space-top-10 space-bottom-10 space-left-6">
                        <ol>
                            <li><b>E-mail:</b> gilberto.giro.resende@gmail.com <a href="" class="space-left-6">Remover participante</a></li>
                            <li><b>E-mail:</b> gilberto.giro.resende@gmail.com <a href="" class="space-left-6">Remover participante</a></li>
                            <li><b>E-mail:</b> gilberto.giro.resende@gmail.com <a href="" class="space-left-6">Remover participante</a></li>
                        </ol>
                    </div>

                    <div class="form-group" style="width:80%">
                        <label for="prioridade" class="form-label">Qual a prioridade do projeto?</label>
                        Esta é uma configuração muito importante no projeto, pois é este passo que definirá os avisos/alertas que serão enviados
                        para o proprietário do projeto. Então, lembre-se de sempre prestar muita atenção.
                        <div class="table space-top-10">
                            <div class="table-row">
                                <div class="table-cell width-10">
                                    <input type="radio" value="1" name="idprioridade" id="prioridade" checked>
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
                                    <input type="radio" value="2" name="idprioridade" id="prioridade">
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
                                    <input type="radio" value="3" name="idprioridade" id="prioridade">
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
                                    <input type="radio" value="4" name="idprioridade" id="prioridade">
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
                        <input type="date" class="form-control" name="dtentrega" id="dtentrega">
                    </div>
                    <div class="form-group space-bottom-10" style="width:80%">
                        <label for="project-aditional-options" class="form-label">Opções auxiliares adicionais</label>
                        Estes são alguns recursos opcionais e adicionais fornecidos pelo sistema para lhe auxiliar com o processo inicial de seus projetos, de forma a facilitar
                        algumas tarefas que seriam necessárias. <br>
                        <input type="checkbox" name="alert"> Alertar participantes por e-mail <br>
                        <input type="checkbox" name="alert"> Habilitar repositório na aplicação
                    </div>

                    <input type="hidden" name="idusuario" value="1">
                    <input type="hidden" name="idsituacao" value="1">
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('usuario::projects.javascript.create')
@endsection