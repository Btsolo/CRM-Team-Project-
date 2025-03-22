<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Task;

class TaskStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $task;

    /**
     * Create a new message instance.
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Task Update: ' . ucfirst($this->task->status))
                    ->view('emails.task-status')
                    ->with([
                        'task' => $this->task,
                    ]);
    }
}
