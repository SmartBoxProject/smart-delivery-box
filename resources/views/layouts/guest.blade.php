<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Smart Delivery Box') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>

        *{
            box-sizing:border-box;
        }

        html,
        body{

            margin:0;
            padding:0;

            width:100%;
            min-height:100vh;

            font-family:
                'Inter',
                sans-serif;

            overflow-x:hidden;

            background:
                radial-gradient(
                    circle at top left,
                    rgba(37,99,235,.16),
                    transparent 25%
                ),

                radial-gradient(
                    circle at bottom right,
                    rgba(6,182,212,.12),
                    transparent 30%
                ),

                linear-gradient(
                    135deg,
                    #020617,
                    #081229,
                    #0f172a
                );

            background-attachment:fixed;
        }

        body::before{

            content:"";

            position:fixed;

            width:450px;
            height:450px;

            top:-120px;
            left:-100px;

            border-radius:50%;

            background:
                rgba(37,99,235,.12);

            filter:blur(120px);

            z-index:0;
        }

        body::after{

            content:"";

            position:fixed;

            width:400px;
            height:400px;

            bottom:-140px;
            right:-100px;

            border-radius:50%;

            background:
                rgba(6,182,212,.10);

            filter:blur(120px);

            z-index:0;
        }

        /*
        =====================================
        REMOVE DEFAULT BREEZE STYLE
        =====================================
        */

        .min-h-screen,
        .sm\:justify-center,
        .items-center,
        .bg-gray-100{

            background:transparent !important;
        }

        /*
        =====================================
        MAIN WRAPPER
        =====================================
        */

        .guest-wrapper{

            width:100%;

            min-height:100vh;

            display:flex;

            align-items:center;

            justify-content:center;

            padding:20px;

            position:relative;

            z-index:1;
        }

    </style>

</head>

<body>

    <div class="guest-wrapper">

        {{ $slot ?? '' }}

    </div>

</body>

</html>