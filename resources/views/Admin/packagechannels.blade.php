@extends('Layouts.AdminMaster')

@section('content')

<h2>Assign Channels to Package</h2><br><br>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
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
                    <form action="{{ route('packagechannel_insert') }}" method="POST" class="form-horizontal">
                        @csrf
                        <div class="control-group">
                            <label class="control-label" for="packageid">Package:</label>
                            <div class="controls col-sm-9">
                                <select name="packageid" id="packageid" required class="form-control">
                                    <option value="">-- Select Package --</option>
                                    @foreach($packages as $package)
                                        <option value="{{ $package->packageid }}">{{ $package->packagename }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div id="channelsContainer" class="control-group">
                            <label class="control-label">Select Channels:</label>
                            <div class="controls col-sm-9">
                                <!-- Checkboxes will be dynamically loaded here via AJAX -->
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-success custom-button">Assign Channels</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('#packageid').change(function() {
            var packageId = $(this).val();
            if (packageId) {
                $.ajax({
                    url: '/getChannels/' + packageId,
                    type: 'GET',
                    success: function(data) {
                        var channelsContainer = $('#channelsContainer .controls');
                        channelsContainer.empty(); // Clear previous checkboxes

                        $.each(data.channels, function(key, value) {
                            var isChecked = data.assignedChannels.includes(value.channelid) ? 'checked disabled' : '';
                            
                            channelsContainer.append(
                                '<div class="form-check">' +
                                '<input class="form-check-input" type="checkbox" name="channel_ids[]" value="' + value.channelid + '" id="channel_' + value.channelid + '" ' + isChecked + '>' +
                                '<label class="form-check-label" for="channel_' + value.channelid + '">' +
                                value.channelname +
                                '</label>' +
                                '</div>'
                            );
                        });
                    }
                });
            } else {
                $('#channelsContainer .controls').empty();
            }
        });
    });
</script>

<style>
    .form-check {
        margin: 10px 0;
    }

    .form-check-input {
        margin-right: 10px;
    }

    .form-check-label {
        font-weight: 600;
        color: #333;
    }

    .form-actions {
        margin-top: 20px;
    }

    /* Button Styling */
    .custom-button {
        background-color: #f50057;
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        border-radius: 8px;
        cursor: pointer;
        transition-duration: 0.4s;
    }

    .custom-button:hover {
        background-color: #c51162;
        color: white;
    }

    select {
        padding: 10px;
        border-radius: 4px;
        border: 1px solid #ccc;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
    }

    select:focus {
        border-color: #66afe9;
        outline: 0;
        box-shadow: 0 0 8px rgba(102, 175, 233, 0.6);
    }

    .control-group {
        margin-top: 15px;
    }
</style>

@endsection
