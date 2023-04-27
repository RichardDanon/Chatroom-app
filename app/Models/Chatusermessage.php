<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chatusermessage extends Model
{
    use HasFactory;

    protected $fillable=[
        'message_id',
        'receivers_id',
        'senders_id',
    ];
}
