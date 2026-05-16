<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Smart Delivery Box Login</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{

            min-height:100vh;

            font-family:'Inter',sans-serif;

            display:flex;

            justify-content:center;

            align-items:center;

            overflow:hidden;

            padding:20px;

            background:

            radial-gradient(
            circle at top left,
            rgba(6,182,212,0.20),
            transparent 25%
            ),

            radial-gradient(
            circle at bottom right,
            rgba(59,130,246,0.15),
            transparent 25%
            ),

            linear-gradient(
            135deg,
            #020617,
            #081226,
            #0f172a
            );
        }

        .login-card{

            width:100%;

            max-width:430px;

            background:
            rgba(15,23,42,0.92);

            border:
            1px solid rgba(255,255,255,0.06);

            border-radius:34px;

            padding:42px 32px;

            position:relative;

            overflow:hidden;

            backdrop-filter:blur(20px);

            box-shadow:
            0 30px 80px rgba(0,0,0,0.65);
        }

        .login-card::before{

            content:"";

            position:absolute;

            width:260px;

            height:260px;

            background:
            rgba(6,182,212,0.08);

            border-radius:50%;

            top:-140px;

            right:-140px;

            filter:blur(20px);
        }

        .login-card::after{

            content:"";

            position:absolute;

            width:240px;

            height:240px;

            background:
            rgba(59,130,246,0.08);

            border-radius:50%;

            bottom:-130px;

            left:-130px;

            filter:blur(20px);
        }

        .content{

            position:relative;

            z-index:2;
        }

        .logo-box{

            width:100px;

            height:100px;

            border-radius:30px;

            background:
            linear-gradient(
            135deg,
            #06b6d4,
            #22d3ee
            );

            margin:auto;

            margin-bottom:28px;

            display:flex;

            justify-content:center;

            align-items:center;

            color:white;

            font-size:44px;

            font-weight:900;

            box-shadow:
            0 0 40px rgba(6,182,212,0.45);
        }

        .title{

            color:white;

            text-align:center;

            font-size:46px;

            font-weight:800;

            line-height:1.15;
        }

        .subtitle{

            text-align:center;

            color:#94a3b8;

            margin-top:12px;

            margin-bottom:30px;

            font-size:15px;
        }

        .system-text{

            text-align:center;

            margin-bottom:30px;

            color:#cbd5e1;

            font-size:15px;

            font-weight:500;
        }

        .input-group{

            margin-bottom:24px;
        }

        .input-group label{

            display:block;

            color:#e2e8f0;

            margin-bottom:10px;

            font-size:14px;

            font-weight:600;
        }

        .input-group input{

            width:100%;

            background:
            rgba(255,255,255,0.03);

            border:
            1px solid rgba(255,255,255,0.08);

            border-radius:18px;

            padding:16px;

            color:white;

            font-size:15px;

            outline:none;

            transition:0.3s;
        }

        .input-group input:focus{

            border-color:#06b6d4;

            box-shadow:
            0 0 0 4px rgba(6,182,212,0.15);
        }

        .remember{

            display:flex;

            align-items:center;

            gap:10px;

            margin-bottom:30px;

            color:#94a3b8;

            font-size:14px;
        }

        .remember input{

            width:18px;

            height:18px;
        }

        .bottom-row{

            display:flex;

            justify-content:space-between;

            align-items:center;

            gap:20px;
        }

        .register-link{

            color:#22d3ee;

            text-decoration:none;

            font-size:14px;

            font-weight:600;
        }

        .login-btn{

            border:none;

            background:
            linear-gradient(
            135deg,
            #06b6d4,
            #22d3ee
            );

            color:white;

            padding:16px 34px;

            border-radius:18px;

            font-size:15px;

            font-weight:700;

            cursor:pointer;

            transition:0.3s;

            box-shadow:
            0 12px 25px rgba(6,182,212,0.28);
        }

        .login-btn:hover{

            transform:translateY(-2px);

            box-shadow:
            0 18px 35px rgba(6,182,212,0.38);
        }

        @media(max-width:576px)
        {
            body{

                padding:14px;
            }

            .login-card{

                padding:34px 24px;

                border-radius:28px;
            }

            .title{

                font-size:38px;
            }

            .bottom-row{

                flex-direction:column;

                align-items:stretch;
            }

            .login-btn{

                width:100%;
            }

            .register-link{

                text-align:center;
            }
        }

    </style>

</head>

<body>

<div class="login-card">

    <div class="content">

        <!-- LOGO -->

        <div class="logo-box">

            ◈

        </div>

        <!-- TITLE -->

        <div class="title">

            Smart Delivery Box

        </div>

        <div class="subtitle">

            Courier & Owner Login

        </div>

        <!-- SYSTEM -->

        <div class="system-text">

            Owner & Courier Access System

        </div>

        <!-- LOGIN FORM -->

        <form method="POST"
              action="{{ route('login') }}">

            @csrf

            <!-- EMAIL -->

            <div class="input-group">

                <label>Email</label>

                <input type="email"
                       name="email"
                       required>

            </div>

            <!-- PASSWORD -->

            <div class="input-group">

                <label>Password</label>

                <input type="password"
                       name="password"
                       required>

            </div>

            <!-- REMEMBER -->

            <div class="remember">

                <input type="checkbox"
                       name="remember">

                Remember me

            </div>

            <!-- BUTTON -->

            <div class="bottom-row">

                <a href="/register"
                   class="register-link">

                    Register Courier

                </a>

                <button type="submit"
                        class="login-btn">

                    LOG IN

                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>