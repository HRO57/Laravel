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
                    {{-- <button type="button" class="toggle_btn" onclick="login()">Log in</button>
                    <button type="button" class="toggle_btn" onclick="register()">Register</button> --}}
                </div>
                <form action="{{ route('login-user') }}" method="post" id="login" class="input_group">
                    @csrf
    
                        @if (Session::has ('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif
                        @if (Session::has ('fail'))
                            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                        @endif
                    
                    <div class="form_div">
                        <input type="text" class="form_input" placeholder="" name="email" value="">
                        <label for="email" class="form_label">Email :</label>
                        <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                    </div>
    
    
                    <div class="form_div">
                        <input type="password" class="form_input" placeholder="" name="password" value="">
                        <label for="password" class="form_label">Password :</label>
                        <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                    </div>
    
                    <button type="submit" class="submit_btn">Log in</button>
                    <a href="registration">New User !!!  Register Here.</a>
                </form>
            </div>
        </div>
    </div>
</body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="{{ asset('frontend') }}/custom.js"></script>

</html>