<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = [
        'ticket_code',
        'category',
        'reporter_name',
        'reporter_contact',
        'content',
        'photo_evidence',
        'status',
        'response_note',
        'responder_id',
    ];

    public function responder()
    {
        return $this->belongsTo(User::class, 'responder_id');
    }
}
