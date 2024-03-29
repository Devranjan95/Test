<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to right bottom, #4A00E0, #50C878);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 90%;
            max-width: 1200px;
        }
        .left-section {
            flex: 1;
            padding: 20px;
            perspective: 1000px;
        }
        .left-section img {
            max-width: 100%;
            animation: rotateImage 10s linear infinite alternate;
            transform-style: preserve-3d;
        }
        .right-section {
            flex: 1;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .login-container {
            max-width: 400px;
            margin: 0 auto;
        }
        .login-container h2 {
            color: #4A00E0;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 30px;
            position: relative;
        }
        .form-control {
            border-radius: 25px;
            border: none;
            padding: 15px;
            background-color: #f5f5f5;
        }
        .toggle-password {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }
        .btn-primary {
            border-radius: 0;
            padding: 10px 100px;
            background-color: #4A00E0;
            border: none;
            font-weight: 500;
        }
        .btn-primary:hover {
            background-color: #50C878;
        }

        @keyframes rotateImage {
            from {
                transform: rotateY(0deg);
            }
            to {
                transform: rotateY(360deg);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-section">
            <!-- You can replace the placeholder image URL with your desired image -->
            <img src="assets/images/login.jpg" width='400px' alt="Image">
        </div>
        <div class="right-section">
            <div class="login-container">
                <h2>Login</h2>
                    @if(session('fail'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('fail') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                <form name="loginform" id="loginform" method="POST" action="{{url('login')}}">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" id="username" name='username' placeholder="Enter Username" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name='password' placeholder="Password" required>
                        <span class="toggle-password" onclick="togglePassword()">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                    
                </form>
            </div>
        </div>
    </div>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script>
        function togglePassword() {
            var passwordField = document.getElementById("password");
            var icon = document.querySelector(".toggle-password i");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }
    </script>
 <script>
   
</script>
</body>
</html>
