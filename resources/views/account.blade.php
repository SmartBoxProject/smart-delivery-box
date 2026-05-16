<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>Account Settings</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet">

<style>

body{
    background:#0b1120;
    color:white;
    font-family:Inter,sans-serif;
}

.layout{
    display:flex;
    min-height:100vh;
}

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
}

.profile{
    padding:20px;
}

.profile-box{
    background:#1f2937;
    padding:16px;
    border-radius:16px;
}

.menu{
    padding:20px 12px;
    flex:1;
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
}

.menu-btn.active{
    background:#0f172a;
    border-left:4px solid #06b6d4;
    color:white;
}

.content{
    flex:1;
    padding:40px;
}

.card-box{
    background:rgba(17,24,39,0.9);
    border-radius:24px;
    padding:30px;
    max-width:700px;
}

input{
    background:#1f2937 !important;
    border:none !important;
    color:white !important;
    height:55px;
    border-radius:14px !important;
}

.btn-save{
    width:100%;
    height:55px;
    border:none;
    border-radius:14px;
    background:#06b6d4;
    color:white;
    font-weight:700;
    margin-top:20px;
}

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
}

</style>

</head>

<body>

<div class="layout">

<div class="sidebar">

<div class="logo">

<div class="logo-icon">

◈

</div>

<div>

Smart Box Delivery

</div>

</div>

<div class="profile">

<div class="profile-box">

<div>

{{ Auth::user()->name }}

</div>

<div>

{{ Auth::user()->role }}

</div>

</div>

</div>

<div class="menu">

<a href="/dashboard"
   class="menu-btn">

📊 Dashboard

</a>

<a href="/settings"
   class="menu-btn">

⚙ Settings

</a>

<a href="/account"
   class="menu-btn active">

👤 Account

</a>

</div>

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

<div class="content">

<h1 class="mb-4">

Account Settings

</h1>

<div class="card-box">

@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif

<form method="POST"
      action="{{ route('account.update') }}">

@csrf

<div class="mb-4">

<label class="mb-2">

Email Address

</label>

<input type="email"
       name="email"
       class="form-control"
       value="{{ Auth::user()->email }}"
       required>

</div>

<div class="mb-4">

<label class="mb-2">

New Password

</label>

<input type="password"
       name="password"
       class="form-control">

</div>

<div class="mb-4">

<label class="mb-2">

Confirm Password

</label>

<input type="password"
       name="password_confirmation"
       class="form-control">

</div>

<button type="submit"
        class="btn-save">

Save Changes

</button>

</form>

</div>

</div>

</div>

</body>
</html>