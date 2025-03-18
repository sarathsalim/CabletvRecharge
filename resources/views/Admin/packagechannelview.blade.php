@extends('Layouts.AdminMaster')

@section('content')

<h2>All Package Channels</h2><br><br>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            @foreach ($packages as $package)
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon"><i class="icon-th-list"></i></span>
                        <h5>Package: {{ $packages->packagename }} (ID: {{ $packages->packageid }})</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Channel ID</th>
                                    <th>Channel Name</th>
                                    <th>Language</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($package->channels as $channel)
                                    <tr>
                                        <td>{{ $channel->channelid }}</td>
                                        <td>{{ $channel->channelname }}</td>
                                        <td>{{ $channel->language }}</td>
                                        <td>
                                            <a href="{{ route('delete_packagechannel', [$package->packageid, $channel->channelid]) }}" 
                                               class="btn btn-danger btn-sm" 
                                               onclick="return confirm('Are you sure you want to delete this channel?');">
                                               Delete
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">No channels assigned to this package.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
            @endforeach
        </div>
    </div>
</div>

@endsection
