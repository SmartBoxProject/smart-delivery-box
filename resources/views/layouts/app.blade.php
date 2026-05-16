<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Smart Delivery Box</title>

    <!-- Bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Bootstrap Icons -->

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        body{
            background:#f1f5f9;
            overflow-x:hidden;
        }

        /* SIDEBAR */

        .sidebar{
            width:260px;
            height:100vh;
            position:fixed;
            left:0;
            top:0;
            background:#0f172a;
            color:white;
            padding:24px;
        }

        .sidebar-title{
            font-size:34px;
            font-weight:bold;
            margin-bottom:40px;
        }

        /* PROFILE */

        .profile-box{
            background:#1e293b;
            padding:18px;
            border-radius:18px;
            margin-bottom:30px;
        }

        .profile-name{
            font-size:18px;
            font-weight:bold;
        }

        .profile-role{
            font-size:13px;
            opacity:0.8;
        }

        /* BUTTON */

        .menu-btn{
            width:100%;
            background:#2563eb;
            border:none;
            color:white;
            padding:16px;
            border-radius:16px;
            font-size:18px;
            margin-bottom:18px;
            transition:0.3s;
        }

        .menu-btn:hover{
            background:#1d4ed8;
        }

        /* LOGOUT */

        .logout-btn{
            width:100%;
            background:#dc2626;
            border:none;
            color:white;
            padding:14px;
            border-radius:16px;
            font-size:16px;
        }

        /* CONTENT */

        .main-content{
            margin-left:260px;
            padding:24px;
        }

        .card{
            border:none;
            border-radius:24px;
            box-shadow:0 5px 20px rgba(0,0,0,0.05);
        }

        /* MOBILE */

        @media(max-width:768px)
        {
            .sidebar{
                width:100%;
                height:auto;
                position:relative;
            }

            .main-content{
                margin-left:0;
                padding:12px;
            }
        }

    </style>

</head>

<body>

    <!-- SIDEBAR -->

    <div class="sidebar">

        <!-- TITLE -->

        <div class="sidebar-title">

            Smart Box

        </div>

        <!-- USER PROFILE -->

        <div class="profile-box">

            <div class="profile-name">

                <i class="bi bi-person-circle"></i>

                {{ Auth::user()->name }}

            </div>

            <div class="profile-role">

                {{ Auth::user()->role }}

            </div>

        </div>

        <!-- COURIER FORM -->

        <a href="/delivery"
           class="text-decoration-none">

            <button class="menu-btn">

                <i class="bi bi-truck"></i>

                Courier Form

            </button>

        </a>

        <!-- LOGOUT -->

        <form method="POST"
              action="{{ route('logout') }}">

            @csrf

            <button type="submit"
                    class="logout-btn">

                <i class="bi bi-box-arrow-right"></i>

                Logout

            </button>

        </form>

    </div>

    <!-- MAIN CONTENT -->

    <div class="main-content">

        @yield('content')

    </div>

    <!-- Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>