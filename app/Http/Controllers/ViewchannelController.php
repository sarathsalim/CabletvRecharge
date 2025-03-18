<?php

namespace App\Http\Controllers;

use App\Models\Package; 
use Illuminate\Http\Request;

class ViewChannelController extends Controller
{
    public function showChannels($packageid)
    {
        $package = Package::findOrFail($packageid); 
        $channels = $package->channels; 

        return view('Customer.packagechannels', compact('package', 'channels'));
    }
}
