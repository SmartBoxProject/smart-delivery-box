<x-guest-layout>

    <style>

        *{
            box-sizing:border-box;
        }

        html,
        body{

            margin:0;
            padding:0;

            min-height:100vh;

            font-family:
                'Inter',
                sans-serif;

            background:
                radial-gradient(
                    circle at top left,
                    rgba(37,99,235,.18),
                    transparent 25%
                ),

                radial-gradient(
                    circle at bottom right,
                    rgba(6,182,212,.14),
                    transparent 30%
                ),

                linear-gradient(
                    135deg,
                    #020617,
                    #081229,
                    #0f172a
                ) !important;

            overflow-x:hidden;
        }

        /*
        =========================================
        REMOVE WHITE LAYER
        =========================================
        */

        .min-h-screen,
        .bg-gray-100,
        .sm\:justify-center,
        .items-center{

            background:transparent !important;
        }

        /*
        =========================================
        MAIN WRAPPER
        =========================================
        */

        .register-page{

            width:100%;

            min-height:100vh;

            display:flex;

            align-items:center;

            justify-content:center;

            padding:30px 20px;

            position:relative;
        }

        /*
        =========================================
        CARD
        =========================================
        */

        .register-card{

            width:100%;
            max-width:520px;

            padding:42px 34px;

            border-radius:34px;

            background:
                linear-gradient(
                    180deg,
                    rgba(15,23,42,.96),
                    rgba(2,6,23,.96)
                );

            border:
                1px solid rgba(255,255,255,.08);

            box-shadow:
                0 25px 70px rgba(0,0,0,.50);

            backdrop-filter: blur(18px);

            position:relative;

            z-index:10;
        }

        /*
        =========================================
        LOGO
        =========================================
        */

        .logo-box{

            width:90px;
            height:90px;

            margin:auto auto 26px;

            border-radius:28px;

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
                0 0 35px rgba(34,211,238,.35);
        }

        .logo-box svg{

            width:42px;
            height:42px;
        }

        /*
        =========================================
        TITLE
        =========================================
        */

        .title{

            text-align:center;

            font-size:38px;

            font-weight:900;

            color:white;

            letter-spacing:-1px;

            margin-bottom:10px;
        }

        .subtitle{

            text-align:center;

            color:#94a3b8;

            font-size:15px;

            margin-bottom:34px;
        }

        /*
        =========================================
        LABEL
        =========================================
        */

        label{

            color:#dbeafe !important;

            font-size:14px !important;

            font-weight:700 !important;

            margin-bottom:8px !important;
        }

        /*
        =========================================
        TEXTBOX
        =========================================
        */

        input{

            width:100% !important;

            background:
                rgba(255,255,255,.04) !important;

            border:
                1px solid rgba(255,255,255,.08) !important;

            color:white !important;

            border-radius:18px !important;

            padding:16px 18px !important;

            font-size:15px !important;

            transition:.25s ease !important;

            outline:none !important;
        }

        input::placeholder{
            color:#94a3b8;
        }

        input:focus{

            border:
                1px solid rgba(34,211,238,.75) !important;

            background:
                rgba(255,255,255,.06) !important;

            box-shadow:
                0 0 0 4px rgba(34,211,238,.12) !important;
        }

        /*
        =========================================
        BUTTON
        =========================================
        */

        .register-btn{

            width:100%;

            border:none;

            border-radius:18px;

            padding:16px;

            margin-top:10px;

            background:
                linear-gradient(
                    90deg,
                    #2563eb,
                    #06b6d4
                );

            color:white;

            font-size:16px;

            font-weight:800;

            cursor:pointer;

            transition:.25s ease;

            box-shadow:
                0 0 25px rgba(37,99,235,.28);
        }

        .register-btn:hover{

            transform:translateY(-2px);

            box-shadow:
                0 0 35px rgba(6,182,212,.38);
        }

        /*
        =========================================
        LOGIN LINK
        =========================================
        */

        .bottom-link{

            margin-top:24px;

            text-align:center;

            color:#94a3b8;

            font-size:14px;
        }

        .bottom-link a{

            color:#22d3ee;

            text-decoration:none;

            font-weight:700;
        }

        .bottom-link a:hover{
            text-decoration:underline;
        }

        /*
        =========================================
        ERROR
        =========================================
        */

        .error-text{

            color:#fca5a5 !important;

            font-size:13px;
        }

        /*
        =========================================
        MOBILE
        =========================================
        */

        @media(max-width:640px)
        {
            .register-page{
                padding:20px;
            }

            .register-card{

                padding:30px 22px;

                border-radius:26px;
            }

            .title{
                font-size:30px;
            }

            .logo-box{

                width:76px;
                height:76px;

                border-radius:24px;
            }

            .logo-box svg{

                width:34px;
                height:34px;
            }

            input{

                padding:15px !important;
            }
        }

    </style>

    <div class="register-page">

        <div class="register-card">

            <!-- LOGO -->

            <div class="logo-box">

                <svg viewBox="0 0 24 24"
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

            <!-- TITLE -->

            <div class="title">

                Courier Register

            </div>

            <div class="subtitle">

                Create courier delivery account

            </div>

            <!-- FORM -->

            <form method="POST"
                  action="{{ route('register') }}">

                @csrf

                <!-- NAME -->

                <div>

                    <x-input-label for="name"
                                   :value="__('Full Name')" />

                    <x-text-input id="name"
                                  class="block mt-2"
                                  type="text"
                                  name="name"
                                  :value="old('name')"
                                  placeholder="Enter full name"
                                  required autofocus />

                    <x-input-error :messages="$errors->get('name')"
                                   class="mt-2 error-text" />

                </div>

                <!-- EMAIL -->

                <div class="mt-5">

                    <x-input-label for="email"
                                   :value="__('Email Address')" />

                    <x-text-input id="email"
                                  class="block mt-2"
                                  type="email"
                                  name="email"
                                  :value="old('email')"
                                  placeholder="Enter email"
                                  required />

                    <x-input-error :messages="$errors->get('email')"
                                   class="mt-2 error-text" />

                </div>

                <!-- VEHICLE -->

                <div class="mt-5">

                    <x-input-label for="vehicle_plate"
                                   :value="__('Vehicle Plate Number')" />

                    <x-text-input id="vehicle_plate"
                                  class="block mt-2"
                                  type="text"
                                  name="vehicle_plate"
                                  :value="old('vehicle_plate')"
                                  placeholder="Example: VBL1234"
                                  required />

                    <x-input-error :messages="$errors->get('vehicle_plate')"
                                   class="mt-2 error-text" />

                </div>

                <!-- PASSWORD -->

                <div class="mt-5">

                    <x-input-label for="password"
                                   :value="__('Password')" />

                    <x-text-input id="password"
                                  class="block mt-2"
                                  type="password"
                                  name="password"
                                  placeholder="Enter password"
                                  required />

                    <x-input-error :messages="$errors->get('password')"
                                   class="mt-2 error-text" />

                </div>

                <!-- CONFIRM -->

                <div class="mt-5">

                    <x-input-label
                        for="password_confirmation"
                        :value="__('Confirm Password')" />

                    <x-text-input id="password_confirmation"
                                  class="block mt-2"
                                  type="password"
                                  name="password_confirmation"
                                  placeholder="Confirm password"
                                  required />

                </div>

                <!-- BUTTON -->

                <div class="mt-8">

                    <button type="submit"
                            class="register-btn">

                        REGISTER ACCOUNT

                    </button>

                </div>

                <!-- LOGIN -->

                <div class="bottom-link">

                    Already have account?

                    <a href="{{ route('login') }}">

                        Login Here

                    </a>

                </div>

            </form>

        </div>

    </div>

</x-guest-layout>