<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = [
        'bank_account',
        'date',
        'saleman',
        'payment_user',
        'quantity',
        'unit_price',
        'shipping_cost',
        'discount',   
        'total_pay_cost',
        'total_cost',   
        'customer_name',
        'customer_phone_number',
        'reffer_type',
        'address',
        'postal_code',
        'shipping_man',
        'shipping_date',
        'Tracking-Code',
        'shipping_type'

    ];
}
