<?php

namespace App\Models;

use App\Mail\TaskStatusMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory, SoftDeletes,Notifiable;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'customer_id',
        'status',
        'priority',
        'due_date',
        'completed_at'
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function customer():BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
    protected static function boot()
    {
        parent::boot();

        static::updated(function ($task) {
            if (in_array($task->status, ['completed', 'cancelled'])) {
                $user = $task->assignedToUser;
                if ($user) {
                    Mail::to($user->email)->send(new TaskStatusMail($task));
                }
            }
        });
    }
}
