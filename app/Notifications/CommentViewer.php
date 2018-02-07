<?php

namespace App\Notifications;

use App\Models\Participant;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CommentViewer extends Notification
{
    use Queueable;

    /**
     * @var Participant
     */
    protected $data;

    /**
     * CommentViewer constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $participant = Participant::find($this->data['idparticipante']);
        $issuer = Participant::find($this->data['idvisualizador']);

        return [
            'message' => 'Você foi citado em um <b>Comentário</b> de uma Etapa no Projeto <b>' . $participant->project->nmprojeto . '</b>',
            'module'  => 'Projetos',
            'issuer'  => $issuer->user->nome,
            'route'   => route('project.task.show', [$participant->project->id, $this->data['idtarefa']])
        ];
    }
}
