<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lead extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'leads';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'source',
        'assigned_employee',
        'status'
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'assigned_employee');
    }
    public function FollowUp()
    {
        return $this->hasMany(LeadFollowUp::class, 'lead_id');
    }
    public function LeadDetails()
    {
        return $this->hasMany(LeadDetails::class, 'lead_id');
    }
}
