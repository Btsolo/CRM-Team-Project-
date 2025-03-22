<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Project;

class ProjectStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $project;

    /**
     * Create a new message instance.
     */
    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Project Update: ' . ucfirst($this->project->status))
                    ->view('emails.project-status')
                    ->with([
                        'project' => $this->project,
                    ]);
    }
}
