<div class="dropdown notifications right space-right-15">
    <div class="notifications-information">
        <label class="label label-danger">{{ count($notifications) }}</label>
        <i class="fa fa-bell open-notifications"></i>
    </div>
    <ul class="dropdown-menu">
        <div class="padding-10">
            <b class="medium">Notificações e Atualizações<i class="fa fa-bookmark right space-right-6 space-top-2 medium"></i></b>
        </div>

        <li class="divider"></li>

        <div class="overflow-auto without-scroll" style="height:183px;margin-bottom:4px;">
            @if(count($notifications) > 0)
                @foreach($notifications as $notification)
                    <a href="" data-id="{{ $notification->id }}" data-href="{{ (!empty($notification->data['route'])) ? $notification->data['route'] : '' }}" class="block mark-as-read">
                        <li class="notification" style="padding:8px">{!! $notification->data['message'] !!}</li>
                    </a>
                @endforeach
            @else
                <li class="notification">Nenhuma notificação pendente</li>
            @endif
        </div>

        <li class="divider" style="margin-top:-5px;margin-bottom:4px;"></li>

        <div class="block padding-10">
            <a href="{{ route('notification.index') }}"><b class="medium">Visualizar tudo</b></a>
        </div>
    </ul>
</div>
