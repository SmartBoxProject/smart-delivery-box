<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <title>

        Smart Delivery Notification

    </title>

</head>

<body style="font-family: Arial; background:#f4f6f9; padding:20px;">

    <div style="
        max-width:600px;
        margin:auto;
        background:white;
        border-radius:12px;
        padding:30px;
        box-shadow:0 0 10px rgba(0,0,0,0.1);
    ">

        <h2 style="color:#111827;">

            New Delivery Arrived

        </h2>

        <p>

            A new parcel has arrived successfully.

        </p>

        <hr>

        <p>

            <strong>Order ID:</strong>

            {{ $delivery->order_id }}

        </p>

        <p>

            <strong>Courier Name:</strong>

            {{ $delivery->courier_name }}

        </p>

        <p>

            <strong>Courier Company:</strong>

            {{ $delivery->courier_company }}

        </p>

        <p>

            <strong>Food Quantity:</strong>

            {{ $delivery->food_qty }}

        </p>

        <p>

            <strong>Drink Quantity:</strong>

            {{ $delivery->drink_qty }}

        </p>

        <p>

            <strong>Remarks:</strong>

            {{ $delivery->remarks }}

        </p>

        <hr>

        <p style="color:gray;">

            Smart Delivery Box System

        </p>

    </div>

</body>

</html>