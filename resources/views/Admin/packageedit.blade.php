@extends('Layouts.AdminMaster')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid text-center">
        <h2 style="padding-top: 50px">Edit Package</h2>

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

        <form class="forms-sample" action="{{ route('packages.update', $package->packageid) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="packageName">Package Name</label>
                <input type="text" class="form-control" id="packageName" name="packagename" value="{{ old('packagename', $package->packagename) }}" required>
                @error('packagename')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" class="form-control" id="amount" name="amount" value="{{ old('amount', $package->amount) }}" required>
                @error('amount')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="days">Days</label>
                <input type="number" class="form-control" id="days" name="days" value="{{ old('days', $package->days) }}" required>
                @error('days')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" required>{{ old('description', $package->description) }}</textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mr-2"><strong>Update</strong></button>
            <a href="{{ route('packages.insert') }}" class="btn btn-light">Cancel</a>
        </form>

        @if(session('success'))
        <script>
            alert('{{ session('success') }}');
        </script>
        @endif
    </div>
</div>

@endsection
