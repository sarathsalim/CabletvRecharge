<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PackageChannel;
use App\Models\Package;
use App\Models\Channel;

class PackageChannelController extends Controller
{
    public function create()
    {
        $packages = Package::all();
        return view('Admin.packagechannels', compact('packages'));
    }

    public function getChannels($packageid)
    {
        $channels = Channel::all();
        $assignedChannels = PackageChannel::where('packageid', $packageid)->pluck('channelid')->toArray();

        return response()->json([
            'channels' => $channels,
            'assignedChannels' => $assignedChannels
        ]);
    }

    public function store(Request $request)
    {
        foreach ($request->channel_ids as $channel_id) {
            PackageChannel::updateOrCreate([
                'packageid' => $request->packageid,
                'channelid' => $channel_id,
            ]);
        }

        return redirect()->route('showAllPackagesWithChannels')
            ->with('success', 'Channels successfully assigned to package.');
    }

    public function delete_packagechannel($packageid, $channelid)
    {
        $packageChannel = PackageChannel::where('packageid', $packageid)
                                        ->where('channelid', $channelid)
                                        ->firstOrFail();
        $packageChannel->delete();

        return redirect()->route('showAllPackagesWithChannels')
                         ->with('success', 'Channel deleted successfully');
    }

    public function showAllPackagesWithChannels()
    {
        $packages = Package::with('channels')->get();
        return view('Admin.allpackagechannels', compact('packages'));
    }
}
