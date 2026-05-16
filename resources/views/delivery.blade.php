<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width,
          initial-scale=1.0">

    <title>Courier Delivery Form</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{

            font-family:
            'Inter',
            sans-serif;

            background:
            linear-gradient(
            135deg,
            #020617,
            #081229,
            #06142d
            );

            color:white;

            overflow-x:hidden;
        }

        /*
        =========================================
        LAYOUT
        =========================================
        */

        .container{
            display:flex;
            min-height:100vh;
        }

        /*
        =========================================
        SIDEBAR
        =========================================
        */

        .sidebar{

            width:280px;

            background:
            rgba(3,7,18,.95);

            border-right:
            1px solid rgba(255,255,255,.05);

            padding:18px;

            position:fixed;

            left:0;
            top:0;
            bottom:0;

            overflow-y:auto;

            z-index:1000;
        }

        /*
        =========================================
        LOGO
        =========================================
        */

        .logo-section{

            display:flex;

            align-items:center;

            gap:14px;

            margin-bottom:26px;
        }

        .logo-box{

            width:58px;
            height:58px;

            border-radius:18px;

            background:
            linear-gradient(
            135deg,
            #22d3ee,
            #06b6d4
            );

            display:flex;

            align-items:center;

            justify-content:center;

            box-shadow:
            0 0 25px rgba(34,211,238,.35);

            flex-shrink:0;
        }

        .logo-text{

            font-size:18px;

            font-weight:800;

            color:white;
        }

        /*
        =========================================
        USER CARD
        =========================================
        */

        .user-card{

            background:
            linear-gradient(
            180deg,
            rgba(255,255,255,.06),
            rgba(255,255,255,.03)
            );

            border:
            1px solid rgba(255,255,255,.05);

            border-radius:20px;

            padding:18px;

            margin-bottom:26px;
        }

        .user-name{

            font-size:16px;

            font-weight:800;

            line-height:1.5;
        }

        .user-role{

            margin-top:8px;

            color:#94a3b8;

            font-size:14px;
        }

        /*
        =========================================
        MENU
        =========================================
        */

        .menu-title{

            color:#64748b;

            font-size:11px;

            font-weight:700;

            letter-spacing:2px;

            text-transform:uppercase;

            margin-bottom:16px;

            padding-left:8px;
        }

        .sidebar-menu{

            display:flex;

            flex-direction:column;

            gap:6px;
        }

        .sidebar-link{

            width:100%;

            display:flex;

            align-items:center;

            gap:12px;

            padding:14px 16px;

            border-radius:14px;

            text-decoration:none;

            background:transparent;

            border:none;

            color:#e2e8f0;

            font-size:16px;

            font-weight:600;

            cursor:pointer;

            transition:.25s;
        }

        .sidebar-link:hover{

            background:
            rgba(255,255,255,.05);

            color:white;
        }

        .sidebar-link.active{

            position:relative;

            background:
            rgba(255,255,255,.04);

            color:white;
        }

        .sidebar-link.active::before{

            content:"";

            position:absolute;

            left:0;
            top:10px;
            bottom:10px;

            width:4px;

            border-radius:10px;

            background:#22d3ee;

            box-shadow:
            0 0 12px #22d3ee;
        }

        .menu-icon{

            width:18px;

            display:flex;

            justify-content:center;

            font-size:15px;
        }

        .logout-link{

            background:none;

            text-align:left;
        }

        /*
        =========================================
        MAIN
        =========================================
        */

        .main{

            flex:1;

            margin-left:280px;

            padding:28px;
        }

        /*
        =========================================
        MOBILE TOPBAR
        =========================================
        */

        .mobile-topbar{

            display:none;

            align-items:center;

            justify-content:space-between;

            margin-bottom:18px;
        }

        .hamburger{

            width:48px;
            height:48px;

            border:none;

            border-radius:14px;

            background:
            rgba(255,255,255,.08);

            color:white;

            font-size:24px;

            cursor:pointer;
        }

        /*
        =========================================
        PANEL
        =========================================
        */

        .panel{

            background:
            linear-gradient(
            135deg,
            rgba(255,255,255,.06),
            rgba(255,255,255,.03)
            );

            border:
            1px solid rgba(255,255,255,.05);

            border-radius:32px;

            padding:34px;

            backdrop-filter:blur(20px);

            box-shadow:
            0 20px 60px rgba(0,0,0,.35);
        }

        .title{

            font-size:72px;

            line-height:1;

            font-weight:900;

            letter-spacing:-2px;

            margin-bottom:30px;
        }

        /*
        =========================================
        FORM CARD
        =========================================
        */

        .form-card{

            background:
            rgba(255,255,255,.04);

            border:
            1px solid rgba(255,255,255,.05);

            border-radius:28px;

            padding:28px;
        }

        .grid{

            display:grid;

            grid-template-columns:
            repeat(2,minmax(0,1fr));

            gap:24px;
        }

        .full{
            grid-column:1 / -1;
        }

        /*
        =========================================
        INPUT
        =========================================
        */

        .label{

            display:block;

            margin-bottom:10px;

            font-size:15px;

            font-weight:700;
        }

        .input,
        .textarea{

            width:100%;

            background:
            rgba(255,255,255,.05);

            border:
            1px solid rgba(255,255,255,.08);

            border-radius:18px;

            padding:16px;

            color:white;

            font-size:15px;

            outline:none;

            transition:.25s;
        }

        .input:focus,
        .textarea:focus{

            border-color:
            rgba(37,99,235,.8);

            box-shadow:
            0 0 0 4px rgba(37,99,235,.15);
        }

        .input::placeholder,
        .textarea::placeholder{
            color:#94a3b8;
        }

        .textarea{

            min-height:180px;

            resize:vertical;
        }

        /*
        =========================================
        BUTTON
        =========================================
        */

        .submit-btn{

            margin-top:28px;

            min-width:260px;

            border:none;

            border-radius:20px;

            padding:18px 28px;

            background:
            linear-gradient(
            90deg,
            #2563eb,
            #06b6d4
            );

            color:white;

            font-size:18px;

            font-weight:800;

            cursor:pointer;

            transition:.25s;

            box-shadow:
            0 0 30px rgba(37,99,235,.28);
        }

        .submit-btn:hover{

            transform:translateY(-2px);

            box-shadow:
            0 0 35px rgba(6,182,212,.35);
        }

        /*
        =========================================
        SUCCESS
        =========================================
        */

        .success{

            background:
            rgba(34,197,94,.12);

            border:
            1px solid rgba(34,197,94,.25);

            color:#bbf7d0;

            padding:16px;

            border-radius:16px;

            margin-bottom:20px;
        }

        /*
        =========================================
        MOBILE
        =========================================
        */

        .overlay{

            position:fixed;

            inset:0;

            background:
            rgba(0,0,0,.45);

            opacity:0;

            visibility:hidden;

            transition:.25s;

            z-index:999;
        }

        .overlay.show{

            opacity:1;

            visibility:visible;
        }

        @media(max-width:1100px)
        {
            .sidebar{

                left:-300px;

                transition:.3s;
            }

            .sidebar.show{
                left:0;
            }

            .main{

                margin-left:0;

                padding:16px;
            }

            .mobile-topbar{
                display:flex;
            }

            .title{
                font-size:42px;
            }

            .grid{
                grid-template-columns:1fr;
            }

            .submit-btn{
                width:100%;
                min-width:100%;
            }
        }

        @media(max-width:640px)
        {
            .panel{
                padding:20px;
            }

            .form-card{
                padding:18px;
            }

            .title{
                font-size:34px;
            }

            .input,
            .textarea{
                padding:14px;
            }
        }

    </style>

</head>

<body>

@php

$userName =
auth()->user()->name ?? 'Courier';

$userRole =
auth()->user()->role ?? 'courier';

@endphp

<div class="overlay"
     id="overlay"></div>

<div class="container">

    <!-- SIDEBAR -->

    <aside class="sidebar"
           id="sidebar">

        <div class="logo-section">

            <div class="logo-box">

                <svg width="26"
                     height="26"
                     viewBox="0 0 24 24"
                     fill="none"
                     xmlns="http://www.w3.org/2000/svg">

                    <path d="M12 2L21 7V17L12 22L3 17V7L12 2Z"
                          stroke="white"
                          stroke-width="2"
                          stroke-linejoin="round"/>

                    <path d="M12 22V12"
                          stroke="white"
                          stroke-width="2"/>

                    <path d="M21 7L12 12L3 7"
                          stroke="white"
                          stroke-width="2"/>

                </svg>

            </div>

            <div class="logo-text">

                Smart Box Delivery

            </div>

        </div>

        <div class="user-card">

            <div class="user-name">

                {{ $userName }}

            </div>

            <div class="user-role">

                {{ $userRole }}

            </div>

        </div>

        <div class="menu-title">

            Dashboard

        </div>

        <div class="sidebar-menu">

            <a href="{{ url('/delivery') }}"
               class="sidebar-link active">

                <span class="menu-icon">
                    📋
                </span>

                Courier Form

            </a>

            <form method="POST"
                  action="{{ route('logout') }}">

                @csrf

                <button type="submit"
                        class="sidebar-link logout-link">

                    <span class="menu-icon">
                        ⏻
                    </span>

                    Logout

                </button>

            </form>

        </div>

    </aside>

    <!-- MAIN -->

    <main class="main">

        <div class="mobile-topbar">

            <button class="hamburger"
                    id="menuBtn">

                ☰

            </button>

            <div style="
                font-size:20px;
                font-weight:800;
            ">

                Smart Box

            </div>

            <div style="width:48px;"></div>

        </div>

        <section class="panel">

            <h1 class="title">

                Courier Delivery Form

            </h1>

            <div class="form-card">

                @if(session('success'))

                    <div class="success">

                        {{ session('success') }}

                    </div>

                @endif

                <form method="POST"
                      action="{{ route('delivery.store') }}">

                    @csrf

                    <div class="grid">

                        <div>

                            <label class="label">

                                Order ID

                            </label>

                            <input type="text"
                                   class="input"
                                   name="order_id"
                                   placeholder="Enter Order ID">

                        </div>

                        <div>

                            <label class="label">

                                Courier Name

                            </label>

                            <input type="text"
                                   class="input"
                                   name="courier_name"
                                   value="{{ $userName }}">

                        </div>

                        <div class="full">

                            <label class="label">

                                Courier Company

                            </label>

                            <input type="text"
                                   class="input"
                                   name="courier_company"
                                   placeholder="Example: GrabFood / foodpanda / ShopeeFood">

                        </div>

                        <div>

                            <label class="label">

                                Food Quantity

                            </label>

                         <input type="number"
       class="input"
       name="food_qty"
       value="0"
       min="0"
       placeholder="Enter food quantity">

                        </div>

                        <div>

                            <label class="label">

                                Drink Quantity

                            </label>

                           <input type="number"
       class="input"
       name="drink_qty"
       value="0"
       min="0"
       placeholder="Enter drink quantity">

                        </div>

                        <div class="full">

                            <label class="label">

                                Remarks

                            </label>

                            <textarea class="textarea"
                                      name="remarks"
                                      placeholder="Optional remarks"></textarea>

                        </div>

                    </div>

                    <button type="submit"
                            class="submit-btn">

                        Submit Delivery

                    </button>

                </form>

            </div>

        </section>

    </main>

</div>

<script>

const menuBtn =
document.getElementById('menuBtn');

const sidebar =
document.getElementById('sidebar');

const overlay =
document.getElementById('overlay');

menuBtn.addEventListener('click',()=>{

    sidebar.classList.toggle('show');

    overlay.classList.toggle('show');

});

overlay.addEventListener('click',()=>{

    sidebar.classList.remove('show');

    overlay.classList.remove('show');

});

</script>

</body>
</html>