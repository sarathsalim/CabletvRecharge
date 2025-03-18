@extends('Layouts.AdminMaster')

@section('content')

<h2>Edit Channels for Package: {{ $package->packagename }}</h2><br><br>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span6">
            <div class="widget-box">
                <div class="widget-title"> 
                    <span class="icon"> <i class="icon-align-justify"></i> </span>
                </div>
                <div class="widget-content nopadding">
                    <form action="{{ route('packagechannel_update', $package->packageid) }}" method="POST" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="control-group">
                            <label class="control-label" for="channels">Channels:</label>
                            <div class="controls col-sm-9">
                                @foreach($channels as $channel)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="channel_ids[]" value="{{ $channel->channelid }}" id="channel_{{ $channel->channelid }}" {{ in_array($channel->channelid, $package->channels->pluck('channelid')->toArray()) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="channel_{{ $channel->channelid }}">{{ $channel->channelname }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">Update Channels</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
