<?php

namespace App\Models;

use App\Mail\ProjectStatusMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory, SoftDeletes,Notifiable;

    protected $fillable = [
        'name',
        'description',
        'status',
        'priority',
        'start_date',
        'end_date',
        'budget',
        'actual_cost',
        'notes',
        'customer_id'
    ];
    
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function task(): HasMany
    {
        return $this->hasMany(Task::class);
    }
    protected static function boot()
    {
        parent::boot();

        static::updated(function ($project) {
            if (in_array($project->status, ['completed', 'cancelled'])) {
                $manager = $project->manager;
                if ($manager) {
                    Mail::to($manager->email)->send(new ProjectStatusMail($project));
                }
            }
        });
    }
}