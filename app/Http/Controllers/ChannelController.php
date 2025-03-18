<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Channel;

class ChannelController extends Controller
{
    public function addchannel()
    {
        return view('Admin.channelinsert');
    }

    public function channel_insert(Request $request)
{
    // Validate the request data
    $request->validate([
        'channelname' => 'required|string|max:255',
        'language' => 'required|string|max:50',
        'description' => 'nullable|string|max:500',
        'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    if ($request->hasFile('logo')) {
        $image = $request->file('logo');
        $fileName = $image->getClientOriginalName();
        $destinationPath = public_path('/uploads');
        $image->move($destinationPath, $fileName);

        Channel::create([
            'channelname' => $request->channelname,
            'language' => $request->language,
            'description' => $request->description,
            'logo' => $fileName,
        ]);

        return back()->with('success', 'Channel added successfully');
    }
}

    public function channelview()
    {
        $channels = Channel::all();
        return view('Admin.channelview', compact('channels'));
    }
}
