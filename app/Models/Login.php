<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $primaryKey='loginid';
    protected $fillable=['username','password'];
    use HasFactory;
}