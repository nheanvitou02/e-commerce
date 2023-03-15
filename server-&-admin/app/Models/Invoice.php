<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice',
        'customer_id',
        'service',
        'name',
        'phone',
        'address',
        'status',
        'grand_total'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}