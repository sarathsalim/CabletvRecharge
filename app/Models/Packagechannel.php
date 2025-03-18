<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packagechannel extends Model
{ 
    protected $primaryKey='packagechannelid';
    protected $fillable=['packageid','channelid'];
    use HasFactory;
}
