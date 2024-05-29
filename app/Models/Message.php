<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'chat_id',
        'chat_name',
        'message_id',
        'peer_id',
        'text',
        'date',
    ];
    use HasFactory;
}
