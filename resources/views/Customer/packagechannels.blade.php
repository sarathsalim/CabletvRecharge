@extends('Layouts.CustomerMaster')
@section('content')

<!-- Package Channels Section -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1>Channels in {{ $package->packagename }}</h1>
            <p>Price: ₹{{ $package->amount }} | Duration: {{ $package->days }} days</p>

            <!-- Recharge Button -->
            <a href="{{ route('recharge.create', ['packageid' => $package->packageid]) }}" class="btn btn-primary mt-3">Recharge Now</a>
        </div>
    </div>

    <div class="row mt-4">
        @if($channels->isEmpty())
            <div class="col-md-12">
                <p class="text-center">No channels available for this package.</p>
            </div>
        @else
            @foreach($channels as $channel)
            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                <div class="service_box text-center p-3" style="background-color: #FFA500; height: 250px; width: 200px;">
                    <div class="channel-logo-box" style="border: 1px solid #ddd; padding: 10px; margin-bottom: 10px; max-width: 120px; height: 120px; margin: 0 auto;">
                        <img src="{{ asset('uploads/' . $channel->logo) }}" alt="{{ $channel->channelname }} logo" class="img-fluid" style="max-width: 100%; height: auto;">
                    </div>
                    <br><br>
                    <h4 class="residential_text">{{ $channel->channelname }}</h4>
                </div>
            </div>
            @endforeach
        @endif
    </div>

</div>
<!-- Package Channels Section End -->

@endsection
