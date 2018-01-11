<?php

namespace App\Notifications;

use App\Models\Participant;
use App\Models\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\DB;

class ReactivateParticipation extends Notification
{
    use Queueable;

    /**
     * @var Project
     */
    protected $project;

    /**
     * @var Participant
     */
    protected $participant;

    /**
     * ReactivateParticipation constructor.
     *
     * @param Participant $participant
     * @param Project $project
     */
    public function __construct(Participant $participant, Project $project)
    {
        $this->participant = $participant;
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
        $user = DB::table('usuario')->where('id', '=', $this->project->idusuario)->first();

        return [
            'message' => 'Você foi <b>reativado</b> no projeto ' . $this->project->nmprojeto,
            'module'  => 'Projetos',
            'issuer'  => $user->nome,
        ];
    }
}
