<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mini CRM</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        * {
            box-sizing: border-box;
        }

        .bg-image {
            /* The image used */
            background-image: url('images/crm.jpg');

            /* Add the blur effect */
            filter: blur(8px);
            -webkit-filter: blur(8px);

            /* Full height */
            height: 100%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        /* Position text in the middle of the page/image */
        .bg-text {
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/opacity/see-through */
            color: white;
            font-weight: bold;
            border: 3px solid #f1f1f1;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
            width: 80%;
            padding: 20px;
            text-align: center;
        }

        a:link,
        a:visited {
            background-color: #f44337;
            opacity: 1.0;
            color: white;
            margin-top: 20px;
            margin-left: 15px;
            margin-right: 5px;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 50px;
            width: 120px;
            height: 40px;
        }

        a:hover,
        a:active {
            background-color: blue;
            opacity: 0.5;
        }

    </style>

</head>

<body>
<div class="bg-image"></div>
<div class="bg-text">
  
  <h2 style="font-size:50px">Customer Relationship Management</h2>
  <p>Start Your Session</p>
  <div class="dropdown-divider"></div>
  @if(Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4">
                @auth
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 ">Home</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 ">Log in</a>
                @endauth
            </div>
        @endif
</div>
</body>

</html>
