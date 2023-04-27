<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Chatuser extends Model //like category
{
    use HasFactory;

    protected $fillable=[
        'image',
        'firstName',
        'lastName',
        'email',
        'username',
        'password',
    ];

}
