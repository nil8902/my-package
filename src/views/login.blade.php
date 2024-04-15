<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Load jQuery from CDN -->


    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            /* Set a background color if needed */
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* Adjust the height as needed */
        }

        .content {
            width: 0, auto;
            /* Adjust the width as needed */
            background-color: #fff;
            /* Set a background color for the div */
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            /* Add a subtle box shadow */
            display: flex;
            /* Use flex to control the layout */
            border-radius: 12px;
        }

        .image-container {
            flex: 1;
            text-align: center;
        }

        img {
            padding-left: 0%;
            max-width: 200%;
            /* Ensure the image does not exceed its container */
            height: auto;
            /* Maintain the aspect ratio */
            display: block;
            /* Remove extra space beneath the image */
            margin: 0 auto;
            /* Center the image horizontally */
        }

        .form-container {
            flex: 1;
            margin-left: 0%;
            /* Add space between the image and form */
        }

        h2 {
            display: inline;
        }

        .form-control {
            width: 90%;
            height: 25px;
            text-align: center;
            font-family: "Times New Roman", Times, serif;
            font-weight: 400;
            font-size: 15px;
            border-radius: 12px;
            border: 1px solid #eaeaea;
        }

        .form-control:focus {
            border-color: 0 0 10px #b19648;
            outline: none;
            box-shadow: 0 0 5px #b19648;
        }

        .form-group {
            margin-top: 5%;
        }

        .error {
            color: red;
        }

        .btn {
            background-color: #e7b00f;
            /* Green */
            border: none;
            color: white;
            padding: 15px;
            margin: 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            box-shadow: 0 0 10px #b19648;
            width: 200px;
        }

        .btn-primary {
            border-radius: 40px;
        }

        .alert .alert-success {
            color: #b19648;
            /* Custom color for success messages */
            font-weight: bold;
            /* Make the success message bold */
            margin-top: 10px;
            /* Add some margin above the success message */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="content">
            <img src="{{ asset('files/images.jpg') }}" alt="image" />
            <div class="form-container">
                <h2 class="form-title">Sign Up </h2>
                <h2 style="color: #e7b00f;"> Sign In</h2>&nbsp;
                @if (session()->has('success'))
                    <p style="color: green; backgroud:rgb(47, 94, 47)">{{ session('success') }}</p>
                @elseif(session()->has('fail'))
                    <p style="color: red;">{{ session('fail') }}</p>
                @endif
                <form method="post" action="{{ route('check') }}" name="createform" class="createform">
                    @csrf


                    <div class="form-group">
                        <input type="text" class="form-control" id="email" name="email"
                            value="{{ old('email') }}" placeholder=" Enter your email" />
                        {{-- @error('email')
                        <div class="alert alert-danger" style="color: red">{{ $message }}</div>
                       @enderror --}}
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name="password"
                            value="{{ old('password') }}" placeholder=" Enter your Password" />
                    </div>
                    <div class="form-group">
                        <button type="submit" onclick="#" class="btn btn-primary rounded-pill">Get Started</button>
                    </div>
                </form>
                Not registerd yet?<a type="submit" href="{{ route('register') }}"><u>Register</u></a>


            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Load jQuery Validation plugin from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".createform").validate({
                rules: {

                    email: {
                        email: true,
                        required: true
                    },
                    password: "required",
                },
                errorElement: 'span',
                messages: {

                    email: "Please enter your email",
                    password: "Please enter your password",
                },
            });
        });
    </script>

</body>

</html>
