<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $primaryKey='complaintid';
    protected $fillable=['name','complaintid','smartcardno','complaintdate','complaint','status','customerid'];
    
    use HasFactory;
    public function customer()
{
    return $this->belongsTo(Customer::class, 'customerid');
}
}
