<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'customers';
    protected $fillable = [
        'name',
        'phone',
        'email',
        'status',
        'service',
        'price',
        'total_revenue',
        'last_transaction',
        'customer_since',
        'assigned_employee'
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'assigned_employee');
    }
    public function sale()
    {
        return $this->hasMany(Sale::class, 'customer_id');
    }
    public function FollowUp()
    {
        return $this->hasMany(CustomerFollowUp::class, 'lead_id');
    }
    public function CustomerDetails()
    {
        return $this->hasMany(CustomerDetails::class, 'customer_id');
    }
}
