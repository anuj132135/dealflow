<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'image',
        'password',
        'mobile',
        'role',
        'designation',
        'department',
        'status'
    ];

    public function Leads(){
        return $this->hasMany(Lead::class ,'assigned_employee');
    }
    public function Customer(){
        return $this->hasMany(Customer::class ,'assigned_employee');
    }
    public function sales(){
        return $this->hasMany(Sale::class ,'employee_id');
    }
    public function LeadFollowUp(){
        return $this->hasMany(LeadFollowUp::class ,'employee_id');
    }
    public function CustomerFollowUp(){
        return $this->hasMany(CustomerFollowUp::class ,'employee_id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        // 'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            // 'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
