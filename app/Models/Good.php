<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'stock', 'cost_price', 'sale_price'];

    public function vouchers()
    {
        return $this->belongsToMany(Voucher::class);
    }
}
