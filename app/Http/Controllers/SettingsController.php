<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BoxSetting;

use Illuminate\Support\Facades\Http;

class SettingsController extends Controller
{
    // =====================================
    // SHOW SETTINGS PAGE
    // =====================================

    public function index()
    {
        $setting = BoxSetting::first();

        return view(
            'settings',
            compact('setting')
        );
    }

    // =====================================
    // UPDATE SETTINGS
    // =====================================

    public function update(Request $request)
    {
        // =====================================
        // VALIDATION
        // =====================================

        $request->validate([
            'food_setpoint'  => 'required|numeric',
            'drink_setpoint' => 'required|numeric',
        ]);

        // =====================================
        // GET CURRENT SETTING
        // =====================================

        $setting = BoxSetting::first();

        // =====================================
        // CREATE IF EMPTY
        // =====================================

        if(!$setting)
        {
            $setting = new BoxSetting();
        }

        // =====================================
        // UPDATE DATABASE
        // =====================================

        $setting->food_setpoint =
            $request->food_setpoint;

        $setting->drink_setpoint =
            $request->drink_setpoint;

        $setting->save();

        // =====================================
        // SEND TO ESP32 REALTIME
        // =====================================

        try
        {
            // =================================
            // GET ESP32 IP FROM .ENV
            // =================================

            $esp32_ip =
                env('ESP32_IP');

            // =================================
            // SEND HTTP REQUEST
            // =================================

            Http::timeout(5)->get(
                "http://{$esp32_ip}/update-setting",
                [
                    'food' =>
                        $request->food_setpoint,

                    'drink' =>
                        $request->drink_setpoint,
                ]
            );

            // =================================
            // SUCCESS
            // =================================

            return back()->with(
                'success',
                'Setting Updated Successfully'
            );
        }
        catch(\Exception $e)
        {
            // =================================
            // ESP32 OFFLINE
            // =================================

            return back()->with(
                'error',
                'Database Saved but ESP32 Offline'
            );
        }
    }
}