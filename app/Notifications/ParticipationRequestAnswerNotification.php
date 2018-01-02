<?php

namespace App\Notifications;

use App\Models\Participant;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ParticipationRequestAnswerNotification extends Notification
{
    use Queueable;

    /**
     * @var Participant
     */
    protected $participant;

    /**
     * ParticipationRequestAnswerNotification constructor.
     *
     * @param Participant $participant
     */
    public function __construct(Participant $participant)
    {
        $this->participant = $participant;
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
        return [
            'message' => 'O usuário <b>' . $this->participant->user->nome . '</b> optou por ' . (($this->participant->solicitapart === 'ace') ? 'aceitar' : 'recusar') . ' sua requisição de participação',
            'module'  => 'Projetos',
            'issuer'  => $this->participant->user->id,
            'route'   => route('project.request', $this->participant->idprojeto)
        ];
    }
}
