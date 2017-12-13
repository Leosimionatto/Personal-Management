@extends('usuario::layouts.app')

@section('content')
    <div class="projects">
        <div class="menu-top card padding-12 space-bottom-15 relative">
            <div class="block">
                <span class="available-route-option"><a href="{{ route('index') }}">Página inicial <i class="fa fa-arrow-right"></i></a></span>
                <span class="available-route-option"><a href="{{ route('project.index') }}">Projetos <i class="fa fa-arrow-right"></i></a></span>
                <span class="available-route-option"><a href="{{ route('project.show', $project->id) }}">Visualização projeto <i class="fa fa-arrow-right"></i></a></span>
                <span class="disabled-route-option">Informações gerais</span>
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
            <button class="btn btn-danger">Remover Projeto <i class="fa fa-trash white"></i></button>
        </div>
        <div class="card padding-12">
            <div class="card-header">
                <h4>Informações gerais - <span class="title">Personal Management</span>:</h4>
            </div>
            <div class="card-body steps">
                <form>
                    <h4>Principais informações</h4>
                    <div class="form-group">
                        <label for="" class="form-label">Nome do projeto:</label>
                        <input type="text" name="nmprojeto" class="form-control" placeholder="Qual o nome do projeto?" value="{{ old('nmprojeto', $project['nmprojeto']) }}">
                    </div>
                    <div class="form-group">
                        <label for="tipo_projeto" class="form-label">Tipo do projeto:</label>
                        <select name="idtpprojeto" class="form-control" id="tipo_projeto">
                            <option value="">Qual o nome do projeto?</option>
                            @foreach(App\Utilities\ProjectType\Arrays::types() as $type)
                                <option value="{{ $type['id'] }}" {{ old('idtpprojeto', $project->idtpprojeto) == $type['id'] ? 'selected' : '' }}>{{ $type['nmtipo'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tecnologias" class="form-label">Habilidades necessárias:</label>
                        <select name="tecnologias" class="required-multiple-select" id="tecnologias" multiple="multiple">
                            @foreach(App\Utilities\Technologies\Arrays::technologies() as $technology)
                                <option value="{{ $technology['id'] }}" {{ App\Utilities\Technologies\Arrays::selected($project->technologies, $technology['id']) }}>{{ $technology['nome'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Descrição do projeto:</label>
                        <textarea name="" class="form-control form-text-area summernote" placeholder="Qual a descrição do projeto?">{!! $project->descricao !!}</textarea>
                    </div>
                </form>
                <form>
                    <h4>Documentações/Anexos</h4>

                    <div class="form-group">
                        <label for="" class="form-label">Logotipo do projeto:</label>
                        <input type="file" class="space-top-2">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Documentação do projeto:</label>
                        <input type="file" class="space-top-2">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Logotipo do projeto:</label>
                        <input type="file" class="space-top-2">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('usuario::projects.javascript.management')
@endsection