<?php

namespace App\Notifications;

use App\Models\Participant;
use App\Models\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\DB;

class ParticipantFunction extends Notification
{
    use Queueable;

    /**
     * @var Participant
     */
    protected $participant;

    /**
     * @var Project
     */
    protected $project;

    /**
     * ParticipantFunction constructor.
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
            'message' => 'Seu <b>Cargo</b> e seus <b>Deveres</b> foram alterados para o projeto ' . $this->project->nmprojeto,
            'module'  => 'Projetos',
            'issuer'  => $user->nome,
            'route'   => route('project.participant.show', [$this->project->id, $this->participant->id])
        ];
    }
}
