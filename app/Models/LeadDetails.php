<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadDetails extends Model
{
    use HasFactory;

    protected $table = 'lead_details';
    protected $fillable = [
        'lead_id',
        'chat_time',
        'chat_source',
        'chat_status',
        'chat_text'
    ];
     public function Lead()
    {
        return $this->belongsTo(Lead::class, 'lead_id');
    }
}
