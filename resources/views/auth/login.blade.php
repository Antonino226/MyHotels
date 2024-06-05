<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Registration Card</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('upload/background-auth.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        .card {
            max-width: 500px;
            margin: auto;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand">MyHotels</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="admin/login">Area Amministratori</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Card -->
    <div class="card bg-light">
        <div class="card-body">
            <h5 class="card-title" id="card-title">Login</h5>
            <form id="login-form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="loginEmail">Email</label>
                    <input type="email" class="form-control" id="loginEmail" name="email" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                    <label for="loginPassword">Password</label>
                    <input type="password" class="form-control" id="loginPassword" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
            <form id="register-form" method="POST" action="{{ route('register') }}" style="display: none;">
                @csrf
                <div class="form-group">
                    <label for="registerName">Username</label>
                    <input type="text" class="form-control" id="registerName" name="username" placeholder="Enter username" required>
                </div>
                <div class="form-group">
                    <label for="registerEmail">Email</label>
                    <input type="email" class="form-control" id="registerEmail" name="email" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                    <label for="registerPassword">Password</label>
                    <input type="password" class="form-control" id="registerPassword" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
            <div class="text-center mt-3">
                <button class="btn btn-link" id="toggle-btn">Don't have an account? Register</button>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('toggle-btn').addEventListener('click', function() {
            var loginForm = document.getElementById('login-form');
            var registerForm = document.getElementById('register-form');
            var cardTitle = document.getElementById('card-title');
            var toggleBtn = document.getElementById('toggle-btn');
            
            if (loginForm.style.display === 'none') {
                loginForm.style.display = 'block';
                registerForm.style.display = 'none';
                cardTitle.textContent = 'Login';
                toggleBtn.textContent = "Don't have an account? Register";
            } else {
                loginForm.style.display = 'none';
                registerForm.style.display = 'block';
                cardTitle.textContent = 'Register';
                toggleBtn.textContent = 'Already have an account? Login';
            }
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>