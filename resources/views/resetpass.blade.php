<!DOCTYPE html>
<html>
<head>
	<title>EduSyncHub | Forgot password</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/login.css') }}">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="assets/img/waveblue.png">
	<div class="container">
		<div class="img">
			<img src="assets/img/edusync.svg">
		</div>
		<div class="login-content">
			<form method="POST" action="{{route('forgot-password.post')}}">
                @csrf
				<img src="assets/img/uvatar.svg">
				<h2 class="title">Forgot your password ?</h2>
                <p>We take care of it! Enter your email address
                    We will send you a link to change your password</p>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>email</h5>
           		   		<input type="text" class="input" name="email" value="{{ old('email') }}">
           		   </div>
           		</div>
           		
            	<a href="#">Back to the authentication page</a>
            	{{-- <input type="submit" class="btn" value="Send"> --}}
                <input type="submit" class="btn btn-soft-primary w-100" value="{{ __('Email Password Reset Link') }}">
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('loginForm');
            const usernameInput = document.getElementById('usernameInput');
            const passwordInput = document.getElementById('passwordInput');

            const inputs = document.querySelectorAll(".input");

            function addcl() {
                let parent = this.parentNode.parentNode;
                parent.classList.add("focus");
            }

            function remcl() {
                let parent = this.parentNode.parentNode;
                if (this.value == "") {
                    parent.classList.remove("focus");
                }
            }

            inputs.forEach(input => {
                input.addEventListener("focus", addcl);
                input.addEventListener("blur", remcl);
            });

            form.addEventListener('submit', function(event) {
                event.preventDefault();
                if (validateInputs()) {
                    form.submit();
                }
            });

            function validateInputs() {
                const usernameValue = usernameInput.value.trim();
                const passwordValue = passwordInput.value.trim();

                if (usernameValue === '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please enter your username.',
                    });
                    usernameInput.focus();
                    return false;
                }

                if (passwordValue === '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please enter your password.',
                    });
                    passwordInput.focus();
                    return false;
                }

                return true;
            }
        });
    </script>
</body>
</html>
