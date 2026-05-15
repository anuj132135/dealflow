<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerFollowUp extends Model
{
    use HasFactory;

    protected $table = 'customer_follow_ups';
    protected $fillable = [
        'customer_id',
        'employee_id',
        'follow_up_date',
        'type',
        'status'
    ];

    public function Customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
}
