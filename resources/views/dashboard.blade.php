<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>

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
            background:#111827;
            color:white;
            font-size:24px;
            z-index:9999;
            box-shadow:0 5px 20px rgba(0,0,0,0.3);
        }

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
            border-right:1px solid rgba(255,255,255,0.05);
            display:flex;
            flex-direction:column;
        }

        .logo{
            display:flex;
            align-items:center;
            gap:14px;
            padding:26px;
            border-bottom:1px solid rgba(255,255,255,0.05);
            font-size:20px;
            font-weight:800;
        }

        .logo-icon{
            width:46px;
            height:46px;
            border-radius:14px;
            background:linear-gradient(
            135deg,
            #06b6d4,
            #2563eb
            );
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:22px;
            font-weight:900;
            box-shadow:
            0 0 20px rgba(6,182,212,0.35);
        }

        /* ===================================== */
        /* PROFILE */
        /* ===================================== */

        .profile{
            padding:20px;
            border-bottom:1px solid rgba(255,255,255,0.05);
        }

        .profile-box{
            background:#1f2937;
            padding:16px;
            border-radius:18px;
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
            gap:14px;
            border:none;
            background:transparent;
            color:#d1d5db;
            padding:15px 16px;
            border-radius:14px;
            margin-bottom:10px;
            text-decoration:none;
            transition:0.3s ease;
            font-weight:600;
        }

        .menu-btn:hover{
            background:#1f2937;
            color:white;
            transform:translateX(4px);
        }

        .menu-btn.active{
            background:#0f172a;
            color:white;
            border-left:4px solid #06b6d4;
            box-shadow:
            0 0 20px rgba(6,182,212,0.15);
        }

        .menu-icon{
            width:24px;
            display:flex;
            justify-content:center;
            font-size:18px;
        }

        /* ===================================== */
        /* LOGOUT */
        /* ===================================== */

        .logout{
            padding:20px;
        }

        .logout button{
            width:100%;
            background:linear-gradient(
            135deg,
            #dc2626,
            #ef4444
            );
            border:none;
            color:white;
            padding:14px;
            border-radius:14px;
            font-weight:700;
            transition:0.3s;
        }

        .logout button:hover{
            transform:translateY(-2px);
        }

        /* ===================================== */
        /* CONTENT */
        /* ===================================== */

        .content{
            flex:1;
            padding:30px;
            background:linear-gradient(
            135deg,
            #0b1120,
            #111827
            );
        }

        .dashboard-title{
            font-size:56px;
            font-weight:900;
            margin-bottom:30px;
        }

        /* ===================================== */
        /* CARD */
        /* ===================================== */

        .card-box{
            background:rgba(17,24,39,0.9);
            border:1px solid rgba(255,255,255,0.05);
            border-radius:24px;
            padding:28px;
            margin-bottom:24px;
            box-shadow:0 10px 30px rgba(0,0,0,0.3);
            transition:0.3s;
        }

        .card-box:hover{
            transform:translateY(-4px);
        }

        .card-title{
            font-size:18px;
            opacity:0.8;
        }

        .metric{
            font-size:52px;
            font-weight:900;
            margin-top:10px;
        }

        .online{
            color:#10b981;
        }

        /* ===================================== */
        /* TABLE */
        /* ===================================== */

        table{
            color:white !important;
        }

        thead{
            border-bottom:1px solid rgba(255,255,255,0.1);
        }

        tbody tr{
            border-bottom:1px solid rgba(255,255,255,0.05);
            transition:0.3s;
        }

        tbody tr:hover{
            background:rgba(255,255,255,0.04);
        }

        td,
        th{
            padding:18px !important;
            vertical-align:middle;
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

            .dashboard-title{
                font-size:34px;
            }

            .metric{
                font-size:36px;
            }

            td,
            th{
                font-size:13px;
                padding:12px !important;
            }
        }

        @media(max-width:576px)
        {
            .dashboard-title{
                font-size:28px;
            }

            .metric{
                font-size:28px;
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

        <!-- LOGO -->

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
               class="menu-btn active">

                <span class="menu-icon">

                    📊

                </span>

                <span>

                    Dashboard

                </span>

            </a>

            <!-- SETTINGS -->

            <a href="/settings"
               class="menu-btn">

                <span class="menu-icon">

                    ⚙

                </span>

                <span>

                    Settings

                </span>

            </a>

            <!-- ACCOUNT -->

            <a href="/account"
               class="menu-btn">

                <span class="menu-icon">

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

        <h1 class="dashboard-title">

            Dashboard

        </h1>

        <!-- STATUS -->

        <div class="row">

            <div class="col-md-3">

                <div class="card-box">

                    <div class="card-title">

                        ESP32

                    </div>

                    <div class="metric online"
                         id="esp32-online">

                        ONLINE

                    </div>

                </div>

            </div>

            <div class="col-md-3">

                <div class="card-box">

                    <div class="card-title">

                        Food Temp

                    </div>

                    <div class="metric"
                         id="food-temp">

                        --

                    </div>

                </div>

            </div>

            <div class="col-md-3">

                <div class="card-box">

                    <div class="card-title">

                        Drink Temp

                    </div>

                    <div class="metric"
                         id="drink-temp">

                        --

                    </div>

                </div>

            </div>

            <div class="col-md-3">

                <div class="card-box">

                    <div class="card-title">

                        Door

                    </div>

                    <div class="metric"
                         id="door-state">

                        LOCKED

                    </div>

                </div>

            </div>

        </div>

        <!-- SETPOINT -->

        <div class="row">

            <div class="col-md-4">

                <div class="card-box">

                    <div class="card-title">

                        Food Setpoint

                    </div>

                    <div class="metric">

                        {{ $setting->food_setpoint ?? 35 }}

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card-box">

                    <div class="card-title">

                        Drink Setpoint

                    </div>

                    <div class="metric">

                        {{ $setting->drink_setpoint ?? 25 }}

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card-box">

                    <div class="card-title">

                        Total Deliveries

                    </div>

                    <div class="metric"
                         id="total-deliveries">

                        {{ $totalDeliveries }}

                    </div>

                </div>

            </div>

        </div>

        <!-- TABLE -->

        <div class="card-box">

            <h2 class="mb-4">

                Latest Deliveries

            </h2>

            <div class="table-responsive">

                <table class="table">

                    <thead>

                    <tr>

                        <th>Order ID</th>
                        <th>Courier</th>
                        <th>Food</th>
                        <th>Drink</th>
                        <th>Remarks</th>
                        <th>Time</th>

                    </tr>

                    </thead>

                    <tbody id="deliveryTableBody">

                    @foreach($deliveries as $delivery)

                    <tr>

                        <td>{{ $delivery->order_id }}</td>

                        <td>{{ $delivery->courier_name }}</td>

                        <td>{{ $delivery->food_qty }}</td>

                        <td>{{ $delivery->drink_qty }}</td>

                        <td>{{ $delivery->remarks }}</td>

                        <td>{{ $delivery->created_at }}</td>

                    </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<script>

// =====================================
// MOBILE SIDEBAR
// =====================================

function toggleSidebar()
{
    document
        .getElementById('sidebar')
        .classList
        .toggle('show');
}

// =====================================
// REALTIME STATUS
// =====================================

async function refreshStatus()
{
    try
    {
        const res =
            await fetch('/dashboard/status');

        const data =
            await res.json();

        document.getElementById(
            'esp32-online'
        ).textContent =
            data.online
            ? 'ONLINE'
            : 'OFFLINE';

        document.getElementById(
            'food-temp'
        ).textContent =
            data.food_temp ?? '--';

        document.getElementById(
            'drink-temp'
        ).textContent =
            data.drink_temp ?? '--';

        document.getElementById(
            'door-state'
        ).textContent =
            data.door_state ?? '--';
    }

    catch(e)
    {
        document.getElementById(
            'esp32-online'
        ).textContent =
            'OFFLINE';
    }
}

// =====================================
// REALTIME DELIVERY TABLE
// =====================================

async function refreshDeliveries()
{
    try
    {
        const response =
            await fetch('/latest-deliveries');

        const data =
            await response.json();

        let html = '';

        data.deliveries.forEach(delivery =>
        {
            html += `
            <tr>

                <td>${delivery.order_id ?? ''}</td>

                <td>${delivery.courier_name ?? ''}</td>

                <td>${delivery.food_qty ?? 0}</td>

                <td>${delivery.drink_qty ?? 0}</td>

                <td>${delivery.remarks ?? ''}</td>

                <td>${delivery.created_at ?? ''}</td>

            </tr>
            `;
        });

        document.getElementById(
            'deliveryTableBody'
        ).innerHTML = html;

        document.getElementById(
            'total-deliveries'
        ).textContent =
            data.total;
    }

    catch(error)
    {
        console.log(error);
    }
}

// =====================================
// START AUTO REFRESH
// =====================================

refreshStatus();

refreshDeliveries();

setInterval(refreshStatus, 5000);

setInterval(refreshDeliveries, 3000);

</script>

</body>
</html>