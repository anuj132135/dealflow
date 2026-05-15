<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerDetails extends Model
{
     use HasFactory;

    protected $table = 'customer_details';
    protected $fillable = [
        'customer_id',
        'chat_source',
        'chat_status',
        'chat_text'
    ];
     public function Customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
