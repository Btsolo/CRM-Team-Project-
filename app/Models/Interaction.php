<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Interaction extends Model
{
    /** @use HasFactory<\Database\Factories\InteractionFactory> */
    use HasFactory, SoftDeletes,Notifiable;

    protected $table = 'interactions';
    protected $fillable = [
        'customer_id',
        'user_id',
        'type',
        'subject',
        'details',
        'interaction_date'
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function customer():BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
