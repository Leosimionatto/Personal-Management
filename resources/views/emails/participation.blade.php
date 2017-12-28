<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body>
        <h3 style="margin:0">Olá, {{ $data['nmparticipante'] }}!</h3>
        <div style="margin-top:-3px;">
            <p>
                Há uma nova <b>requisição de participação</b> em um Projeto esperando por sua aprovação. Para visualizar a requisição, basta
                <a href="{{ route('project.participation.request', $data['token']) }}">clicar aqui</a> <br>
            </p>
            <p class="block space-top-6">
                Atenciosamente, <br> <b>Personal Management.</b>
            </p>
        </div>
    </body>
</html>