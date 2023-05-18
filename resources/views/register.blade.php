<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="container">
    <h2 class="text-center mt-5">Registration Form</h2>
    <div id="register-form">
        <form>
            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" class="form-control" id="firstName">
            </div>
            <div class="form-group">
                <label for="lastName">Last Name:</label>
                <input type="text" class="form-control" id="lastName">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password">
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" class="form-control" id="confirmPassword">
            </div>
            <button type="button" id="registerButton" class="btn btn-primary">Register</button>
        </form>
    </div>
    <div id="success-message" class="alert alert-success mt-3" style="display: none">
        Registration Successful!
    </div>
    <div id="error-message" class="alert alert-danger" style="display: none; width: 100%;">
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
