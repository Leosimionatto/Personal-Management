@extends('usuario::layouts.app')

@section('content')
    <div class="home-page">
        <div class="menu-top card padding-12 space-bottom-15 relative">
            <div class="block">
                <span class="disabled-route-option">Página inicial</span>
                <span class="right sign-out"><a href="{{ route('logout') }}" class="disabled-route-option">Sair <i class="fa fa-sign-out"></i></a></span>

                @include('usuario::layouts.notification')

                <span class="right disabled-route-option space-right-15">Personal Management</span>
            </div>
        </div>
        <div class="modules card space-bottom-10">
            <div class="modules-explanation-title">
                <h3>Módulos disponíveis - <span class="project-color">Explicação</span>:</h3>
            </div>
            <div class="modules-explanation-body text-center space-bottom-10">
                <div class="text text-left">
                    Com os módulos que iremos lhe mostrar você terá a capacidade de gerenciar todas as suas informações e/ou situações rotineiras com a facilidade
                    e praticidade de um sistema completo e integrado. E aí? Vamos lá?
                </div>
                <a href="{{ route('project.index') }}">
                    <div class="module inline-block">
                        <figure>
                            <img src="{{ asset('img/seo-marketing/png/012-folder-3.png') }}" alt="Projetos" width="55px">
                            <figcaption><b>Projetos</b></figcaption>
                            Tem problemas com o gerenciamento de compromissos? Nós te ajudamos!
                        </figure>
                    </div>
                </a>
                <div class="module inline-block">
                    <figure>
                        <img src="{{ asset('img/business-and-office/png/011-presentation.png') }}" alt="Atividades" width="55px">
                        <figcaption><b>Atividades</b></figcaption>
                        Tem problemas com o gerenciamento de compromissos? Nós te ajudamos!
                    </figure>
                </div>
                <div class="module inline-block">
                    <figure>
                        <img src="{{ asset('img/seo-marketing/png/083-address-book.png') }}" alt="Estudos" width="55px">
                        <figcaption><b>Estudos</b></figcaption>
                        Tem problemas com o gerenciamento de compromissos? Nós te ajudamos!
                    </figure>
                </div>
                <div class="module inline-block">
                    <figure>
                        <img src="{{ asset('img/seo-marketing/png/081-alarm.png') }}" alt="Compromissos" width="55px">
                        <figcaption><b>Compromissos</b></figcaption>
                        Tem problemas com o gerenciamento de compromissos? Nós te ajudamos!
                    </figure>
                </div>
            </div>
        </div>
        <div class="goals-framework card padding-12 space-bottom-10">
            <div class="space-left-6 text-left space-bottom-6 inline-block width-49">
                <h3>Quadro de metas - <span class="project-color">Ordem de relevância</span>:</h3>
                <span style="padding-left:3px">
                    <?php
                        setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'portuguese');
                        date_default_timezone_set('America/Sao_Paulo');

                        echo strftime('%A, %d de %B de %Y', strtotime('today'));
                    ?>
                </span>
            </div>
            <div class="goals-filter text-right inline-block width-49">
                <button type="submit" name="search" class="right space-left-4">Buscar <i class="fa fa-search"></i></button>
                <input type="text" name="search" placeholder="O que você busca?">
                <span class="filter-box"><i class="fa fa-mortar-board"></i></span>
            </div>
            <div class="goals">
                <table>
                    <thead>
                    <th>Título</th>
                    <th>Comentário</th>
                    <th>Conquistado (%)</th>
                    <th>Prioridade</th>
                    <th>Previsão conquista</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Zend Framework</td>
                        <td>Um ótimo framework de PHP</td>
                        <td><progress value="70" max="100">22%</progress></td>
                        <td><label class="label label-danger">Máxima</label></td>
                        <td>25/06/2017</td>
                    </tr>
                    <tr>
                        <td>NodeJs</td>
                        <td>Um ótimo framework de Javascript</td>
                        <td><progress value="22" max="100">22%</progress></td>
                        <td><label class="label label-warning">Média</label></td>
                        <td>01/09/2017</td>
                    </tr>
                    <tr>
                        <td>Laravel</td>
                        <td>Um ótimo framework de PHP</td>
                        <td><progress value="35" max="100">35%</progress></td>
                        <td><label class="label label-danger">Máxima</label></td>
                        <td>25/08/2017</td>
                    </tr>
                    <tr>
                        <td>Angular 2</td>
                        <td>Um ótimo framework de Javascript</td>
                        <td><progress value="28" max="100">28%</progress></td>
                        <td><label class="label label-success">Mínima</label></td>
                        <td>25/06/2017</td>
                    </tr>
                    <tr>
                        <td>Java</td>
                        <td>Uma ótima linguagem</td>
                        <td><progress value="10" max="100">10%</progress></td>
                        <td><label class="label label-primary">Indefinida</label></td>
                        <td>25/06/2017</td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td class="padding-12 text-right" colspan="5"><a href="">Visualizar todas as metas <i class="fa fa-pie-chart"></i></a></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="card remember inline-block padding-10">
            <div class="remember-title padding-4">
                <h3 style="padding-bottom:6px">Atualizações de Atividades - <span class="project-color">Situação do Prazo</span>:</h3>
            </div>
            <div class="remember-body">
                <div class="sticky-note">
                    <div class="table inline-block space-top-10">
                        <div class="table-row">
                            <div class="table-cell text-center" style="width:15%;vertical-align:top">
                                <img src="{{ asset('img/seo-marketing/png/100-launch.png') }}" alt="Tarefas" width="75%">
                            </div>
                            <div class="table-cell">
                                <span class="block space-bottom-2"><b>Tipo:</b> Apresentação</span>
                                <span class="block space-bottom-2"><b>Situação:</b> <label class="label label-danger">Perigo</label></span>
                                <span class="block space-bottom-2"><b>Data entrega:</b> 16/06/2017</span>
                                <span class="block"><b>Mensagem:</b> Vale 4 pontos na média.</span>
                            </div>
                        </div>
                    </div>
                    <div class="table inline-block">
                        <div class="table-row">
                            <div class="table-cell text-center" style="width:15%;vertical-align:top">
                                <img src="{{ asset('img/seo-marketing/png/100-launch.png') }}" alt="Tarefas" width="75%">
                            </div>
                            <div class="table-cell">
                                <span class="block space-bottom-2"><b>Tipo:</b> Entrega trabalho escrito</span>
                                <span class="block space-bottom-2"><b>Situação:</b> <label class="label label-warning">Cuidado</label></span>
                                <span class="block space-bottom-2"><b>Data entrega:</b> 16/06/2017</span>
                                <span class="block"><b>Mensagem:</b> Vale 4 pontos na média.</span>
                            </div>
                        </div>
                    </div>
                    <div class="table inline-block">
                        <div class="table-row">
                            <div class="table-cell text-center" style="width:15%;vertical-align:top">
                                <img src="{{ asset('img/seo-marketing/png/100-launch.png') }}" alt="Tarefas" width="75%">
                            </div>
                            <div class="table-cell">
                                <span class="block space-bottom-2"><b>Tipo:</b> Entrega trabalho</span>
                                <span class="block space-bottom-2"><b>Situação:</b> <label class="label label-success">Normal</label></span>
                                <span class="block space-bottom-2"><b>Data entrega:</b> 16/06/2017</span>
                                <span class="block"><b>Mensagem:</b> Vale 4 pontos na média.</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <a href="">Visualizar relatório <i class="fa fa-database"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card annotation inline-block remember-post-it">
            <h4>Tipos de lembretes:</h4>
            <label class="label label-primary">Azul</label>
            <span class="block space-bottom-6">São casos em que o término e/ou entrega estão distantes (1-3 meses).</span>
            <label class="label label-success">Verde</label>
            <span class="block space-bottom-6">São casos em que o término e/ou entrega estão em um tempo consideravelmente alto (maior do que 15-30 dias).</span>
            <label class="label label-warning">Amarelo</label>
            <span class="block space-bottom-6">São casos em que o término e/ou entrega estão próximos (7-10 dias).</span>
            <label class="label label-danger">Vermelho</label>
            <span class="block space-bottom-6">São casos em que o término e/ou entrega estão muito próximos (3-5 dias).</span>
        </div>
    </div>
@endsection
