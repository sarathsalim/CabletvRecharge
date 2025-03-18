@extends('Layouts.GuestMaster')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        .login-box {
            width: 400px;
            margin: 100px auto;
            padding: 40px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }

        .login-box h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .form-group label {
            color: #333;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            margin: 5px 0 5px 0;
            border: 1px solid #ccc;
            background: #f9f9f9;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-group input:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0px 0px 5px rgba(0, 123, 255, 0.5);
        }

        .error-message {
            color: #e3342f;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .btn-primary {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .register-link {
            text-align: center;
            margin-top: 10px;
        }

        .register-link a {
            color: #007bff;
        }

        .alert {
            text-align: center;
            padding: 10px;
            margin-top: 10px;
            background-color: #f8d7da;
            color: #721c24;
            border-radius: 5px;
        }

        @media (max-width: 768px) {
            .login-box {
                width: 90%;
                margin: 50px auto;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
<br><br>
<div class="login-box">
    <h1>Customer Login</h1>

    <form method="POST" action="{{ route('customerlogin_process') }}" onsubmit="return validateForm()">
        @csrf

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username">
            <span class="error-message" id="username-error"></span>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" autocomplete="off">
            <span class="error-message" id="password-error"></span>
        </div>

        <button type="submit" class="btn-primary">Login</button>

        <div class="register-link">
            <p>New customer? <a href="{{ route('customer_register') }}">Register here</a></p>
        </div>
    </form>

    <!-- Laravel Validation Errors -->
    @if(session()->has('failed'))
        <div class="alert">
            {{ session('failed') }}
        </div>
    @endif  
</div>

<script>
    function validateForm() {
        let isValid = true;

        // Clear previous error messages
        document.getElementById('username-error').innerText = '';
        document.getElementById('password-error').innerText = '';

        // Get form field values
        const username = document.getElementById('username').value.trim();
        const password = document.getElementById('password').value.trim();

        // Validate Username
        if (username === '') {
            document.getElementById('username-error').innerText = 'Username is required.';
            isValid = false;
        }

        // Validate Password
        if (password === '') {
            document.getElementById('password-error').innerText = 'Password is required.';
            isValid = false;
        }

        return isValid; // Prevent form submission if validation fails
    }
</script>

</body>
</html>
@endsection
