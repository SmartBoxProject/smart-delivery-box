<?php

namespace App\Http\Controllers;

use App\Models\BoxSetting;
use App\Models\Delivery;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class DeliveryController extends Controller
{
    // =====================================================
    // SHOW DELIVERY PAGE
    // =====================================================

    public function index()
    {
        if (Auth::user()->role !== 'courier')
        {
            return redirect('/dashboard');
        }

        return view('delivery');
    }

    // =====================================================
    // STORE DELIVERY
    // =====================================================

    public function store(Request $request)
    {
        // =================================================
        // VALIDATION
        // =================================================

        $request->validate([

            'order_id' => 'required|string|max:255',

            'courier_name' => 'required|string|max:255',

            'courier_company' => 'required|string|max:255',

            'food_qty' => 'nullable|integer|min:0',

            'drink_qty' => 'nullable|integer|min:0',

            'remarks' => 'nullable|string',

        ]);

        // =================================================
        // QUANTITY
        // =================================================

        $foodQty  = (int) ($request->food_qty ?? 0);

        $drinkQty = (int) ($request->drink_qty ?? 0);

        // =================================================
        // SAVE DELIVERY
        // =================================================

        $delivery = Delivery::create([

            'order_id' => $request->order_id,

            'courier_name' => $request->courier_name,

            'courier_company' => $request->courier_company,

            'food_qty' => $foodQty,

            'drink_qty' => $drinkQty,

            'remarks' => $request->remarks,

        ]);

        // =================================================
        // GET TEMPERATURE SETTING
        // =================================================

        $setting = BoxSetting::latest()->first();

        $foodSetpoint =
            $setting?->food_setpoint ?? 35;

        $drinkSetpoint =
            $setting?->drink_setpoint ?? 25;

        // =================================================
        // ESP32 IP
        // =================================================

        $esp32_ip = env('ESP32_IP');

        // =================================================
        // BASE URL
        // =================================================

        $url = "http://{$esp32_ip}/open-door";

        // =================================================
        // FOOD ONLY
        // =================================================

        if ($foodQty > 0 && $drinkQty == 0)
        {
            $url .= "?food={$foodSetpoint}";
        }

        // =================================================
        // DRINK ONLY
        // =================================================

        elseif ($drinkQty > 0 && $foodQty == 0)
        {
            $url .= "?drink={$drinkSetpoint}";
        }

        // =================================================
        // BOTH
        // =================================================

        elseif ($foodQty > 0 && $drinkQty > 0)
        {
            $url .=
                "?food={$foodSetpoint}&drink={$drinkSetpoint}";
        }

        // =================================================
        // OPEN DOOR
        // =================================================

        try
        {
            Http::timeout(5)->get($url);
        }
        catch (\Exception $e)
        {
            // ignore esp32 fail
        }

        // =================================================
        // SEND EMAIL
        // =================================================

        try
        {
            Mail::html(

                '

                <div style="
                    background:#0f172a;
                    padding:40px;
                    font-family:Arial,sans-serif;
                    color:white;
                ">

                    <div style="
                        max-width:650px;
                        margin:auto;
                        background:#111827;
                        border-radius:24px;
                        overflow:hidden;
                        border:1px solid rgba(255,255,255,0.08);
                    ">

                        <!-- HEADER -->

                        <div style="
                            background:linear-gradient(
                            135deg,
                            #06b6d4,
                            #0891b2
                            );
                            padding:30px;
                            text-align:center;
                        ">

                            <h1 style="
                                margin:0;
                                font-size:32px;
                                color:white;
                            ">
                                Smart Box Delivery
                            </h1>

                            <p style="
                                margin-top:10px;
                                color:white;
                                opacity:0.9;
                            ">
                                New Delivery Notification
                            </p>

                        </div>

                        <!-- BODY -->

                        <div style="padding:35px;">

                            <h2 style="
                                margin-top:0;
                                color:#ffffff;
                            ">
                                Delivery Received
                            </h2>

                            <p style="
                                color:#9ca3af;
                                margin-bottom:30px;
                            ">
                                A courier has submitted a new delivery.
                            </p>

                            <!-- DETAILS -->

                            <div style="
                                background:#1f2937;
                                border-radius:18px;
                                padding:25px;
                                margin-bottom:25px;
                            ">

                                <table width="100%"
                                       cellpadding="12"
                                       style="
                                       border-collapse:collapse;
                                       color:white;
                                       ">

                                    <tr>
                                        <td style="color:#9ca3af;">
                                            Order ID
                                        </td>

                                        <td align="right">
                                            <b>'.$delivery->order_id.'</b>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="color:#9ca3af;">
                                            Courier Name
                                        </td>

                                        <td align="right">
                                            <b>'.$delivery->courier_name.'</b>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="color:#9ca3af;">
                                            Courier Company
                                        </td>

                                        <td align="right">
                                            <b>'.$delivery->courier_company.'</b>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="color:#9ca3af;">
                                            Food Quantity
                                        </td>

                                        <td align="right">
                                            <b>'.$delivery->food_qty.'</b>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="color:#9ca3af;">
                                            Drink Quantity
                                        </td>

                                        <td align="right">
                                            <b>'.$delivery->drink_qty.'</b>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="color:#9ca3af;">
                                            Remarks
                                        </td>

                                        <td align="right">
                                            <b>'.
                                            ($delivery->remarks
                                            ?? 'No Remarks')
                                            .'</b>
                                        </td>
                                    </tr>

                                </table>

                            </div>

                            <!-- STATUS BOX -->

                            <div style="
                                background:#3f3f1a;
                                border:1px solid #facc15;
                                padding:25px;
                                border-radius:18px;
                                text-align:center;
                                margin-bottom:25px;
                            ">

                                <div style="
                                    color:#fcd34d;
                                    font-size:14px;
                                    margin-bottom:10px;
                                ">
                                    DELIVERY STATUS
                                </div>

                                <div style="
                                    font-size:34px;
                                    font-weight:900;
                                    color:#fde68a;
                                ">
                                    RECEIVED
                                </div>

                            </div>

                            <!-- BUTTON -->

                            <a href="'.env('APP_URL').'/dashboard"
                               style="
                               display:block;
                               text-align:center;
                               background:#06b6d4;
                               color:white;
                               padding:18px;
                               border-radius:14px;
                               text-decoration:none;
                               font-weight:700;
                               font-size:18px;
                               ">
                                Open Dashboard
                            </a>

                        </div>

                    </div>

                </div>

                ',

                function ($message)
                {
                    $message
                        ->to('rukhsahnst.rusman02@gmail.com')
                        ->subject('Smart Box Delivery Notification');
                }

            );
        }
        catch (\Exception $e)
        {
            return back()->with(
                'error',
                'Email failed: '.$e->getMessage()
            );
        }

        // =================================================
        // SUCCESS
        // =================================================

        return back()->with(
            'success',
            'Delivery submitted successfully.'
        );
    }
}