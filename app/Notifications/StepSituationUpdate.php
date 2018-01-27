<?php

namespace App\Notifications;

use App\Models\Step;
use Illuminate\Bus\Queueable;
use App\Utilities\Situation\Arrays as Situation;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class StepSituationUpdate extends Notification
{
    use Queueable;

    /**
     * @var array
     */
    protected $data;

    /**
     * StepSituationUpdate constructor.
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
        $step = Step::find($this->data['idetapa']);

        return [
            'message' => 'A tarefa "<b>' . $step->task->nmtarefa .'</b>" foi alterada para <b>' . Situation::situations($this->data['idsituacao']) . '</b> no projeto <b>' . $step->task->project->nmprojeto . '</b>',
            'module'  => 'Projetos',
            'issuer'  => $step->task->participant->user->nome,
            'route'   => route('project.task.show', ['id' => $this->data['idprojeto'], 'number' => $step->task->id])
        ];
    }
}
