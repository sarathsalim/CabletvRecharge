@extends('Layouts.AdminMaster')

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add New Channel</h4>

                    <!-- Check for success message -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Display validation errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Form starts here -->
                    <form class="forms-sample" action="{{ route('channel_insert') }}" method="POST" enctype="multipart/form-data">
                        @csrf <!-- CSRF token for security -->

                        <div class="form-group">
                            <label for="channelname">Channel Name</label>
                            <input type="text" name="channelname" class="form-control" id="channelname" placeholder="Channel Name" value="{{ old('channelname') }}" required>
                            @error('channelname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="language">Language</label>
                            <input type="text" name="language" class="form-control" id="language" placeholder="Language" value="{{ old('language') }}" required>
                            @error('language')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" id="description" placeholder="Description">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="logo">Channel Logo</label>
                            <input type="file" name="logo" class="form-control-file" id="logo" required>
                            @error('logo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
