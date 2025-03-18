<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $primaryKey='packageid';
    protected $fillable=['packagename','amount','days','description'];
    public function channels()
{
    return $this->belongsToMany(Channel::class, 'packagechannels', 'packageid', 'channelid');
}
public function recharges()
{
    return $this->hasMany(Recharge::class, 'packageid', 'packageid');
}
    
    
}
