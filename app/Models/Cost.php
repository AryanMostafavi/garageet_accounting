<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'about',
        'desc',
        'payment_user',
        'bank_account',
        'status'     
    ];
}
