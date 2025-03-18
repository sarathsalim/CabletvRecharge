@extends('Layouts.AdminMaster')

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add New Package</h4>

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
                    <form class="forms-sample" action="{{ route('packages.store') }}" method="POST">
                        @csrf <!-- CSRF token for security -->

                        <div class="form-group">
                            <label for="packagename">Package Name</label>
                            <input type="text" name="packagename" class="form-control" id="packagename" placeholder="Package Name" value="{{ old('packagename') }}" required>
                            @error('packagename')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="text" name="amount" class="form-control" id="amount" placeholder="Amount" value="{{ old('amount') }}" required>
                            @error('amount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="days">Days</label>
                            <input type="number" name="days" class="form-control" id="days" placeholder="Days" value="{{ old('days') }}" required>
                            @error('days')
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

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
