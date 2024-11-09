<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    protected $fillable = ['date', 'user_id','description', 'type','status', 'total_amount', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function entries()
    {
        return $this->hasMany(VoucherEntity::class);
    }
    public function costs()
    {
        return $this->hasMany(Cost::class);
    }

    public function goods()
    {
        return $this->belongsToMany(Good::class)->withPivot('quantity');
    }
}
