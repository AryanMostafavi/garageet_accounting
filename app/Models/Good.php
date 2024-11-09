<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    use HasFactory;
    protected $fillable = ['name','type', 'order_id','section','cost_price', 'sale_price','description'];

    public function vouchers()
    {
        return $this->belongsToMany(Voucher::class);
    }
}
