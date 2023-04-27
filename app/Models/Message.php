<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Message extends Model //like items
{
    use HasFactory;

    protected $fillable=[
        'body',
        'image',
        'receiver_id',
        'sender_id',
    ];

    // public function chatUser(): BelongsTo
    // {
    //     return $this->belongsTo(ChatUser::class);
    // }
}
