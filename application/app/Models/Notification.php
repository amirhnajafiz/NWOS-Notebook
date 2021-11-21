<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Notification is for a single user to create a notification.
 * @package App\Models
 */
class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'date',
        'user_id'
    ];

    protected $casts = [
        'date' => 'datetime'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
