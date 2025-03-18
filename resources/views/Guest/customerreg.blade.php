@extends('Layouts.GuestMaster')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration</title>
    <style>
        .card {
            margin-left:5%;
            margin-right:5%;
            margin-top: 5%;
        }

        .alert {
            margin-top: 15px;
            padding: 10px;
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            border-radius: 4px;
            text-align: center;
        }

        .error-message {
            color: #e3342f;
            font-size: 0.875em;
        }

        /* Responsive adjustments */
        @media (max-width: 600px) {
            .container {
                padding: 15px;
            }
        }
    </style>
</head>
<body>

<!-- Customer Registration Page -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            
        </div>
    </div>

    <!-- Customer Registration Form -->
    <div class="card border-white">
        <div class="card-header border-primary bg-secondary text-white">
            <h1 style="text-align:center;">Customer Registration</h1>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('customer_insert') }}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name"><h5>Name</h5></label>
                            <input type="text" name="name" class="form-control" placeholder="Enter name" required>
                            @error('name')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email"><h5>Email</h5></label>
                            <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                            @error('email')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="contactno"><h5>Contact Number</h5></label>
                            <input type="text" name="contactno" class="form-control" placeholder="Enter contact number" required>
                            @error('contactno')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="aadharno"><h5>Aadhar Number</h5></label>
                            <input type="text" name="aadharno" class="form-control" placeholder="Enter Aadhar number" required>
                            @error('aadharno')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username"><h5>Username</h5></label>
                            <input type="text" name="username" class="form-control" placeholder="Enter username" required>
                            @error('username')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password"><h5>Password</h5></label>
                            <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                            @error('password')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="smartcardno"><h5>Smart Card Number</h5></label>
                            <input type="text" name="smartcardno" class="form-control" placeholder="Enter smart card number" required>
                            @error('smartcardno')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="enddate"><h5>End Date</h5></label>
                            <input type="date" name="enddate" class="form-control" required>
                            @error('enddate')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </div>
            </form>
        </div>

        <div class="card-footer bg-primary text-white">
            @if(session('success'))
                <div class="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>
</div>

</body>
</html>
@endsection
