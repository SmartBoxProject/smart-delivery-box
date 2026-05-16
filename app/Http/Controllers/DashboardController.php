<?php

namespace App\Http\Controllers;

use App\Models\BoxSetting;
use App\Models\Delivery;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // ======================================================
    // DASHBOARD PAGE
    // ======================================================

    public function index()
    {
        $user = Auth::user();

        // ==============================================
        // COURIER REDIRECT
        // ==============================================

        if ($user->role === 'courier')
        {
            return redirect('/scanqr');
        }

        // ==============================================
        // SETTINGS
        // ==============================================

        $setting =
            BoxSetting::latest()->first();

        // ==============================================
        // DELIVERY LIST
        // ==============================================

        $deliveries =
            Delivery::latest()
            ->take(10)
            ->get();

        // ==============================================
        // ESP32 STATUS
        // ==============================================

        $status =
            $this->fetchEsp32Status();

        // ==============================================
        // TOTAL DELIVERY
        // ==============================================

        $totalDeliveries =
            Delivery::count();

        return view(
            'dashboard',
            compact(
                'setting',
                'deliveries',
                'status',
                'totalDeliveries'
            )
        );
    }

    // ======================================================
    // REALTIME ESP32 STATUS
    // ======================================================

    public function status()
    {
        $status =
            $this->fetchEsp32Status();

        // ==============================================
        // OFFLINE
        // ==============================================

        if (!$status)
        {
            return response()->json([
                'online' => false,
            ]);
        }

        // ==============================================
        // ONLINE
        // ==============================================

        return response()->json([

            'online' =>
                true,

            'food_temp' =>
                $status['food_temp'] ?? null,

            'drink_temp' =>
                $status['drink_temp'] ?? null,

            'food_enable' =>
                $status['food_enable'] ?? null,

            'drink_enable' =>
                $status['drink_enable'] ?? null,

            'heater_state' =>
                $status['heater_state'] ?? null,

            'peltier_state' =>
                $status['peltier_state'] ?? null,

            'door_state' =>
                $status['door_state'] ?? null,
        ]);
    }

    // ======================================================
    // LATEST DELIVERY API
    // ======================================================

    public function latestDeliveries()
    {
        $deliveries =
            Delivery::latest()
            ->take(10)
            ->get([
                'order_id',
                'courier_name',
                'food_qty',
                'drink_qty',
                'remarks',
                'created_at'
            ]);

        return response()->json([

            'deliveries' => $deliveries,

            'total' => Delivery::count()

        ]);
    }

    // ======================================================
    // ESP32 STATUS FETCH
    // ======================================================

    private function fetchEsp32Status(): ?array
    {
        // ==============================================
        // GET ESP32 IP
        // ==============================================

        $esp32Ip = env('ESP32_IP');

        if (!$esp32Ip)
        {
            return null;
        }

        // ==============================================
        // URL
        // ==============================================

        $url =
            "http://{$esp32Ip}/status";

        // ==============================================
        // GET JSON
        // ==============================================

        $json =
            @file_get_contents($url);

        if ($json === false)
        {
            return null;
        }

        // ==============================================
        // DECODE JSON
        // ==============================================

        $data =
            json_decode($json, true);

        return is_array($data)
            ? $data
            : null;
    }
}