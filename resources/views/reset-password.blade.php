<!DOCTYPE html>
<html>

<head>
    <title>EduSyncHub | Reset password</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/login.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <img class="wave" src="assets/img/waveblue.png">
    <div class="container">
        <div class="img">
            <img src="assets/img/edusync.svg">
        </div>
        <div class="login-content">
            <form method="POST" action="{{ route('password.update') }}" class="mt-4">
                @csrf
                <input type="hidden" name="reset_token" value="{{ $token }}">
                

                <img src="assets/img/uvatar.svg">
                <h2 class="title">Reset Password</h2>
                <p>Enter your email address and password to access account</p>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>email</h5>
                        {{-- <input id="usernameInput" type="text" class="input" name="email"> --}}
                        <input id="usernameInput" class="input @error('email') is-invalid @enderror" type="email" name="email" value="{{old('email', $email)}}"  required autofocus />
                                                
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Password</h5>
                       
                        <input id="passwordInput" class="input @error('password') is-invalid @enderror" type="password" name="password"  required autocomplete="new-password" />
                                                
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                </div>

                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5> Confirm Password</h5>
                        {{-- <input id="passwordInput" type="password" class="input" name="Cpassword"> --}}
                        <input id="password_confirmation" class="input @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation"  required autocomplete="new-password" />
                                                
                       

                    </div>
                </div> 
               
                <input type="submit" class="btn" value="{{ __('Reset Password') }}">
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
