<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Message extends Model
{
    use HasFactory;

    protected $fillable=[
        'body',
        'image',
        'image',
        'pricreceivers_ide',
        'senders_id',
    ];

    public function chatUser(): BelongsTo
    {
        return $this->belongsTo(ChatUser::class);
    }
}
