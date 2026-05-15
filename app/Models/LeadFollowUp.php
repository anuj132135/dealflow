<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadFollowUp extends Model
{
     use HasFactory;

    protected $table = 'lead_follow_ups';
    protected $fillable = [
        'lead_id',
        'employee_id',
        'follow_up_date',
        'type',
        'status'
    ];

    public function Lead()
    {
        return $this->belongsTo(Lead::class, 'lead_id');
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
 
}
