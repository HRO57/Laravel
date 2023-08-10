<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Custom Authentication</title>
    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> --}}
</head>
<body>
    <div class="container">
        <div class="form_box1">
            <div class="btn_box1">
                <div id="btn"></div>
            </div>
           
            <form id="register" class="input_group1" action="{{ route('register-user') }}" method="post">
                @csrf

                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                @if (Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                @endif
    
                <div class="form_div">
                    <input type="text" class="form_input" placeholder="" name="name" value="{{ old('name') }}">
                    <label for="name" class="form_label">Full Name</label>
                    <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                </div>

                <div class="form_div">
                    <input type="text" class="form_input" placeholder="" name="email" value=""id="email">
                    <label for="email" class="form_label">Email</label>
                    <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                </div>

                <div id="emailError" class="text-danger"></div>

                <div class="form_div">
                    <input type="phone" class="form_input" placeholder="" name="phone" value="" id="phone">
                    <label for="phone" class="form_label">Phone</label>
                    <span class="text-danger">@error('phone'){{ $message }} @enderror</span>
                </div>

                <div id="phoneError" class="text-danger"></div>

                <div class="form_div">
                    <input type="password" class="form_input" placeholder="" name="password" value=""id="password">
                    <label for="password" class="form_label">Password</label>
                    <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                </div>

                <div id="passwordError" class="text-danger"></div>
                

                <button type="submit" class="submit_btn">Register</button>
                <a href="login">Already Registered !! Login Here.</a>
            </form>
        </div>
    </div>

    <!---------------------- JavaScript section ------------------------>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // -------------- function for validate phone--------------------------
        function validatePhone() {
            const phoneInput = $("#phone");
            const phoneError = $("#phoneError");
            const phonePattern = /^(\+?8801[356789]\d{8}|01[356789]\d{8})$/;

            phoneError.text("");

            if (!phonePattern.test(phoneInput.val().trim())) {
                phoneInput.addClass("is-invalid");
                phoneError.html("<i class='fas fa-exclamation-circle me-1'></i> Please enter a valid phone number for Bangladesh.");
            } else {
                phoneInput.removeClass("is-invalid");
            }
        }
    // -------------- End function for validate phone--------------------------

        // -------------- Start function for validate Email--------------------------
                    function validateEmail() {
                        const emailInput = $("#email");
                        const emailError = $("#emailError");
                        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    
                        emailError.text("");
                    
                        if (!emailPattern.test(emailInput.val().trim())) {
                            emailInput.addClass("is-invalid");
                            emailError.html("<i class='fas fa-exclamation-circle me-1'></i> Please enter a valid email address.");
                        } else {
                            emailInput.removeClass("is-invalid");
                        }
                    }
        // -------------- End function for validate Email--------------------------
        // -------------- Start function for validate Password--------------------------
                        function validatePassword() {
                            const passwordInput = $("#password");
                            const passwordError = $("#passwordError");
                            const passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@#$%^&+=!])(?!.*\s)[A-Za-z\d@#$%^&+=!]{8,}$/;
                            // At least 8 characters, one letter, and one number required
                        
                            passwordError.text("");
                        
                            if (!passwordPattern.test(passwordInput.val())) {
                                passwordInput.addClass("is-invalid");
                                passwordError.html("<i class='fas fa-exclamation-circle me-1'></i> Password must be at least 8 characters and contain at least one letter and one number.");
                            } else {
                                passwordInput.removeClass("is-invalid");
                            }
                        }
        // -------------- End function for validate Password--------------------------

        //----------------- Attach the validate function to the input blur event
                    $("#phone").blur(validatePhone);
                    $("#email").blur(validateEmail);
                    $("#password").blur(validatePassword);

        //---------------- Attach the validate function to the form submission event

                    $("#register").submit(function(event) {
                        validatePhone();
                        validateEmail();
                        validatePassword();
        // If either phone number or email is invalid, prevent form submission

        if ($("#phone").hasClass("is-invalid") || $("#email").hasClass("is-invalid") || $("#password").hasClass("is-invalid")) {
            event.preventDefault();
        }
            });

    </script>
</body>
</html>
