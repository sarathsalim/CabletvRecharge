<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $primaryKey='paymentid';
    protected $fillable = ['rechargeid', 'paydate', 'amount', 'status', 'customerid'];
        public function recharge()
    {
        return $this->belongsTo(Recharge::class, 'rechargeid', 'rechargeid');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customerid');
    }
    use HasFactory;
}
