<?php

namespace App\Notifications;

use App\Models\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ParticipationRequestNotification extends Notification
{
    use Queueable;

    /**
     * @var Project
     */
    protected $project;

    /**
     * ParticipationRequestNotification constructor.
     *
     * @param Project $project
     */
    public function __construct(Project $project)
    {
        $this->project = $project;
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
            'message' => 'Há uma nova <b>Requisição de Participação</b> em um projeto esperando por sua aprovação.',
            'module' => 'Projetos',
            'issuer' => $this->project->user->nome
        ];
    }
}
