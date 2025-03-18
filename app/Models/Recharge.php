<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recharge extends Model
{   
    protected $primaryKey='rechargeid';
    protected $fillable = ['smartcardno', 'packageid', 'rechargedate', 'packageduedate', 'amount', 'customerid'];
        public function package()
    {
        return $this->belongsTo(Package::class, 'packageid', 'packageid'); 
    }
    public function payments()
    {
        return $this->hasMany(Payment::class, 'rechargeid');
    }
    public function customer()
{
    return $this->belongsTo(Customer::class, 'customerid', 'customerid');
}
    use HasFactory;
    
}
