<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Settings</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{

            background:#0b1120;

            color:white;

            font-family:Inter,sans-serif;

            overflow-x:hidden;
        }

        /* ===================================== */
        /* MOBILE BUTTON */
        /* ===================================== */

        .mobile-toggle{

            display:none;

            position:fixed;

            top:15px;

            left:15px;

            width:52px;

            height:52px;

            border:none;

            border-radius:16px;

            background:#1f2937;

            color:white;

            font-size:24px;

            z-index:9999;

            box-shadow:
            0 5px 20px rgba(0,0,0,0.3);
        }

        /* ===================================== */
        /* LAYOUT */
        /* ===================================== */

        .layout{

            display:flex;

            min-height:100vh;
        }

        /* ===================================== */
        /* SIDEBAR */
        /* ===================================== */

        .sidebar{

            width:280px;

            background:#111827;

            border-right:
            1px solid rgba(255,255,255,0.05);

            display:flex;

            flex-direction:column;
        }

        .logo{

            display:flex;

            align-items:center;

            gap:14px;

            padding:26px;

            border-bottom:
            1px solid rgba(255,255,255,0.05);

            font-size:18px;

            font-weight:700;
        }

        .logo-icon{

            width:44px;

            height:44px;

            border-radius:12px;

            background:#06b6d4;

            display:flex;

            align-items:center;

            justify-content:center;

            font-size:22px;

            font-weight:900;
        }

        /* ===================================== */
        /* PROFILE */
        /* ===================================== */

        .profile{

            padding:20px;

            border-bottom:
            1px solid rgba(255,255,255,0.05);
        }

        .profile-box{

            background:#1f2937;

            padding:16px;

            border-radius:16px;
        }

        .profile-name{

            font-size:18px;

            font-weight:700;
        }

        .profile-role{

            opacity:0.7;

            margin-top:4px;

            font-size:14px;
        }

        /* ===================================== */
        /* MENU */
        /* ===================================== */

        .menu{

            padding:20px 12px;

            flex:1;
        }

        .menu-title{

            color:#6b7280;

            font-size:12px;

            font-weight:700;

            margin-bottom:12px;

            padding-left:12px;

            letter-spacing:1px;
        }

        .menu-btn{

            width:100%;

            display:flex;

            align-items:center;

            gap:12px;

            border:none;

            background:transparent;

            color:#d1d5db;

            padding:14px 16px;

            border-radius:12px;

            margin-bottom:8px;

            text-decoration:none;

            transition:0.3s;
        }

        .menu-btn:hover{

            background:#1f2937;

            color:white;
        }

        .menu-btn.active{

            background:#0f172a;

            color:white;

            border-left:
            4px solid #06b6d4;
        }

        /* ===================================== */
        /* LOGOUT */
        /* ===================================== */

        .logout{

            padding:20px;
        }

        .logout button{

            width:100%;

            background:#dc2626;

            border:none;

            color:white;

            padding:14px;

            border-radius:12px;

            font-weight:700;
        }

        /* ===================================== */
        /* CONTENT */
        /* ===================================== */

        .content{

            flex:1;

            padding:30px;

            background:
            linear-gradient(
            135deg,
            #0b1120,
            #111827
            );
        }

        .page-title{

            font-size:56px;

            font-weight:900;

            margin-bottom:30px;
        }

        /* ===================================== */
        /* CARD */
        /* ===================================== */

        .settings-card{

            background:
            rgba(17,24,39,0.9);

            border:
            1px solid rgba(255,255,255,0.05);

            border-radius:24px;

            padding:30px;

            box-shadow:
            0 10px 30px rgba(0,0,0,0.3);
        }

        .form-label{

            color:#d1d5db;

            margin-bottom:10px;
        }

        .form-control{

            background:#1f2937;

            border:none;

            color:white;

            padding:16px;

            border-radius:14px;
        }

        .form-control:focus{

            background:#1f2937;

            color:white;

            box-shadow:none;

            border:
            1px solid #06b6d4;
        }

        .save-btn{

            width:100%;

            background:#06b6d4;

            border:none;

            color:white;

            padding:16px;

            border-radius:14px;

            font-size:18px;

            font-weight:700;

            transition:0.3s;
        }

        .save-btn:hover{

            background:#0891b2;
        }

        .success-box{

            background:#064e3b;

            padding:16px;

            border-radius:14px;

            margin-bottom:20px;
        }

        .error-box{

            background:#7f1d1d;

            padding:16px;

            border-radius:14px;

            margin-bottom:20px;
        }

        /* ===================================== */
        /* MOBILE */
        /* ===================================== */

        @media(max-width:991px)
        {
            .mobile-toggle{

                display:block;
            }

            .sidebar{

                position:fixed;

                top:0;

                left:-280px;

                width:260px;

                height:100vh;

                z-index:999;

                transition:0.3s;
            }

            .sidebar.show{

                left:0;
            }

            .content{

                width:100%;

                padding:90px 18px 18px 18px;
            }

            .page-title{

                font-size:34px;
            }
        }

    </style>

</head>

<body>

<button class="mobile-toggle"
        onclick="toggleSidebar()">

    ☰

</button>

<div class="layout">

    <!-- SIDEBAR -->

    <div class="sidebar"
         id="sidebar">

        <div class="logo">

            <div class="logo-icon">

                ◈

            </div>

            <div>

                Smart Box Delivery

            </div>

        </div>

        <!-- PROFILE -->

        <div class="profile">

            <div class="profile-box">

                <div class="profile-name">

                    {{ Auth::user()->name }}

                </div>

                <div class="profile-role">

                    {{ Auth::user()->role }}

                </div>

            </div>

        </div>
<!-- MENU -->

<div class="menu">

    <div class="menu-title">

        DASHBOARD

    </div>

    <!-- DASHBOARD -->

    <a href="/dashboard"
       class="menu-btn">

        <span>

            📊

        </span>

        <span>

            Dashboard

        </span>

    </a>

    <!-- SETTINGS -->

    <a href="/settings"
       class="menu-btn active">

        <span>

            ⚙

        </span>

        <span>

            Settings

        </span>

    </a>

    <!-- ACCOUNT -->

    <a href="/account"
       class="menu-btn">

        <span>

            👤

        </span>

        <span>

            Account

        </span>

    </a>

</div>

        <!-- LOGOUT -->

        <div class="logout">

            <form method="POST"
                  action="{{ route('logout') }}">

                @csrf

                <button type="submit">

                    Logout

                </button>

            </form>

        </div>

    </div>

    <!-- CONTENT -->

    <div class="content">

        <h1 class="page-title">

            Temperature Settings

        </h1>

        @if(session('success'))

            <div class="success-box">

                {{ session('success') }}

            </div>

        @endif

        @if(session('error'))

            <div class="error-box">

                {{ session('error') }}

            </div>

        @endif

        <!-- CARD -->

        <div class="settings-card">

            <form method="POST"
                  action="{{ route('settings.update') }}">

                @csrf

                <div class="row">

                    <div class="col-md-4 mb-4">

                        <label class="form-label">

                            Food Setpoint (°C)

                        </label>

                        <input type="number"
                               step="0.1"
                               name="food_setpoint"
                               class="form-control"
                               value="{{ $setting->food_setpoint ?? 35 }}">

                    </div>

                    <div class="col-md-4 mb-4">

                        <label class="form-label">

                            Drink Setpoint (°C)

                        </label>

                        <input type="number"
                               step="0.1"
                               name="drink_setpoint"
                               class="form-control"
                               value="{{ $setting->drink_setpoint ?? 25 }}">

                    </div>

                    <div class="col-md-4 mb-4">

                        <label class="form-label">

                            Door Delay (seconds)

                        </label>

                        <input type="number"
                               name="door_delay_seconds"
                               class="form-control"
                               value="{{ $setting->door_delay_seconds ?? 5 }}">

                    </div>

                </div>

                <button type="submit"
                        class="save-btn">

                    Save Settings

                </button>

            </form>

        </div>

    </div>

</div>

<script>

function toggleSidebar()
{
    document
        .getElementById('sidebar')
        .classList
        .toggle('show');
}

</script>

</body>
</html>