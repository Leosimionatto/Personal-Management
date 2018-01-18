<?php

namespace App\Notifications;

use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ParticipantTask extends Notification
{
    use Queueable;

    /**
     * @var Task
     */
    protected $task;

    /**
     * ParticipantTask constructor.
     *
     * @param Task $task
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
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
            'message' => 'A seguinte tarefa foi atribuída no projeto <b>' . $this->task->project->nmprojeto . '</b>: ' . $this->task->nmtarefa,
            'module'  => 'Projetos',
            'issuer'  => $this->task->assigner->nome
        ];
    }
}
