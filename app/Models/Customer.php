<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{   
    protected $primaryKey='customerid';
    protected $fillable=['name','email','contactno','aadharno','status','username','password','smartcardno','enddate'];
    public function package()
{
    return $this->belongsTo(Package::class, 'packageid');
}
public function recharges()
    {
        return $this->hasMany(Recharge::class, 'customerid');
    }
    use HasFactory;
}