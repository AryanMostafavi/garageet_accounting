<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'voucher_id',
        'order_number',
        'status',
        'total_amount',
        'order_date',
    ];

    // Relationship to User (Customer)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship to Voucher
    public function voucher()
    {
        return $this->belongsTo(Voucher::class);
    }

    // Relationship to Goods via a pivot table for order items
    public function goods()
    {
        return $this->belongsToMany(Good::class, 'order_good')
            ->withPivot('quantity', 'price')
            ->withTimestamps();
    }
}
