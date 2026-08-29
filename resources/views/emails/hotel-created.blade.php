<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Registration Successful</title>

</head>

<body
    style=" margin:0; padding:0; width:100%; background-color:#f5f7fb; font-family:Arial, Helvetica, sans-serif; color:#111827; ">
    <table width="100%" cellpadding="0" cellspacing="0" border="0"
        style=" width:100%; margin:0; padding:0; background-color:#f5f7fb; ">
        <tr>
            <td align="center" style="padding:40px 15px;"></td> <!-- Main Container -->
            <table width="650" cellpadding="0" cellspacing="0" border="0" style="
                width:100%;
                max-width:650px;
                background:#ffffff;
                border:1px solid #e5e7eb;
                border-radius:18px;
                overflow:hidden;
            ">

                <!-- Header -->
                <tr>
                    <td style="
                    padding:30px 35px;
                    background:#ffffff;
                    border-bottom:1px solid #eef0f4;
                ">

                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr>

                                <!-- Logo -->
                                <td align="left">
                                    <img src="cid:safenest-logo" alt="SafeNest" width="150" style="
        display:block;
        width:150px;
        max-width:150px;
        height:auto;
        border:0;
    ">

                                </td>

                                <!-- Badge -->
                                <td align="right">
                                    <span style="
                                    display:inline-block;
                                    padding:7px 12px;
                                    background:#eef2ff;
                                    color:#4f46e5;
                                    border-radius:20px;
                                    font-size:11px;
                                    font-weight:700;
                                ">
                                        HOTEL REGISTERED
                                    </span>
                                </td>

                            </tr>
                        </table>

                    </td>
                </tr>


                <!-- Hero -->
                <tr>
                    <td style="padding:35px 35px 15px;">

                        <h1 style="
                        margin:0;
                        font-size:28px;
                        line-height:1.3;
                        font-weight:700;
                        color:#111827;
                    ">
                            Welcome to SafeNest! 🏨
                        </h1>

                        <p style="
                        margin:12px 0 0;
                        font-size:15px;
                        line-height:1.7;
                        color:#6b7280;
                    ">
                            Your hotel,
                            <strong style="color:#111827;">
                                {{ $hotel->name }}
                            </strong>,
                            has been successfully registered with SafeNest.
                        </p>

                    </td>
                </tr>


                <!-- Success Card -->
                <tr>
                    <td style="padding:20px 35px 0;">

                        <table width="100%" cellpadding="0" cellspacing="0" border="0" style="
                            background:#f9fafb;
                            border:1px solid #e5e7eb;
                            border-radius:14px;
                        ">
                            <tr>
                                <td style="padding:24px;">

                                    <div style="
                                    margin-bottom:15px;
                                    font-size:15px;
                                    font-weight:700;
                                    color:#111827;
                                ">
                                        Hotel registration completed
                                    </div>

                                    <p style="
                                    margin:0;
                                    font-size:14px;
                                    line-height:1.8;
                                    color:#4b5563;
                                ">
                                        Thank you for registering your property
                                        with SafeNest. Your hotel information
                                        has been successfully added to our
                                        platform.
                                    </p>

                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>


                <!-- Hotel Information -->
                <tr>
                    <td style="padding:24px 35px 0;">

                        <table width="100%" cellpadding="0" cellspacing="0" border="0" style="
                            background:#eef2ff;
                            border-left:4px solid #4f46e5;
                            border-radius:10px;
                        ">
                            <tr>
                                <td style="padding:18px 20px;">

                                    <div style="
                                    margin-bottom:12px;
                                    font-size:11px;
                                    font-weight:700;
                                    letter-spacing:.08em;
                                    text-transform:uppercase;
                                    color:#6366f1;
                                ">
                                        Hotel Information
                                    </div>

                                    <!-- Hotel Name -->
                                    <p style="
                                    margin:0 0 8px;
                                    font-size:14px;
                                    color:#111827;
                                ">
                                        <strong>Hotel:</strong>
                                        {{ $hotel->name }}
                                    </p>

                                    <!-- Destination -->
                                    @if($hotel->destination)
                                        <p style="
                                                            margin:0 0 8px;
                                                            font-size:14px;
                                                            color:#111827;
                                                        ">
                                            <strong>Destination:</strong>
                                            {{ $hotel->destination }}
                                        </p>
                                    @endif

                                    <!-- City -->
                                    @if($hotel->city)
                                        <p style="
                                                            margin:0 0 8px;
                                                            font-size:14px;
                                                            color:#111827;
                                                        ">
                                            <strong>City:</strong>
                                            {{ $hotel->city }}
                                        </p>
                                    @endif

                                    <!-- Address -->
                                    @if($hotel->address)
                                        <p style="
                                                            margin:0 0 8px;
                                                            font-size:14px;
                                                            color:#111827;
                                                        ">
                                            <strong>Address:</strong>
                                            {{ $hotel->address }}
                                        </p>
                                    @endif

                                    <!-- Phone -->
                                    @if($hotel->phone)
                                        <p style="
                                                            margin:0 0 8px;
                                                            font-size:14px;
                                                            color:#111827;
                                                        ">
                                            <strong>Phone:</strong>
                                            {{ $hotel->phone }}
                                        </p>
                                    @endif

                                    <!-- Email -->
                                    @if($hotel->email)
                                        <p style="
                                                            margin:0 0 8px;
                                                            font-size:14px;
                                                            color:#111827;
                                                        ">
                                            <strong>Email:</strong>
                                            {{ $hotel->email }}
                                        </p>
                                    @endif

                                    <!-- Star Rating -->
                                    @if($hotel->star_rating)
                                        <p style="
                                                            margin:0;
                                                            font-size:14px;
                                                            color:#111827;
                                                        ">
                                            <strong>Star Rating:</strong>
                                            {{ $hotel->star_rating }} Star
                                        </p>
                                    @endif

                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>


                <!-- Check-in / Check-out -->
                @if($hotel->check_in_time || $hotel->check_out_time)
                    <tr>
                        <td style="padding:24px 35px 0;">

                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>

                                    @if($hotel->check_in_time)
                                        <td width="50%" valign="top" style="padding-right:8px;">
                                            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="
                                                                                        background:#f9fafb;
                                                                                        border:1px solid #e5e7eb;
                                                                                        border-radius:10px;
                                                                                    ">
                                                <tr>
                                                    <td style="padding:16px;">
                                                        <div style="
                                                                                                font-size:11px;
                                                                                                font-weight:700;
                                                                                                text-transform:uppercase;
                                                                                                letter-spacing:.06em;
                                                                                                color:#6b7280;
                                                                                                margin-bottom:6px;
                                                                                            ">
                                                            Check-in
                                                        </div>

                                                        <div style="
                                                                                                font-size:14px;
                                                                                                font-weight:600;
                                                                                                color:#111827;
                                                                                            ">
                                                            {{ $hotel->check_in_time }}
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    @endif

                                    @if($hotel->check_out_time)
                                        <td width="50%" valign="top" style="padding-left:8px;">
                                            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="
                                                                                        background:#f9fafb;
                                                                                        border:1px solid #e5e7eb;
                                                                                        border-radius:10px;
                                                                                    ">
                                                <tr>
                                                    <td style="padding:16px;">
                                                        <div style="
                                                                                                font-size:11px;
                                                                                                font-weight:700;
                                                                                                text-transform:uppercase;
                                                                                                letter-spacing:.06em;
                                                                                                color:#6b7280;
                                                                                                margin-bottom:6px;
                                                                                            ">
                                                            Check-out
                                                        </div>

                                                        <div style="
                                                                                                font-size:14px;
                                                                                                font-weight:600;
                                                                                                color:#111827;
                                                                                            ">
                                                            {{ $hotel->check_out_time }}
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    @endif

                                </tr>
                            </table>

                        </td>
                    </tr>
                @endif


                <!-- Next Steps -->
                <tr>
                    <td style="padding:24px 35px 0;">

                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td>

                                    <div style="
                                    margin-bottom:10px;
                                    font-size:15px;
                                    font-weight:700;
                                    color:#111827;
                                ">
                                        What's next?
                                    </div>

                                    <p style="
                                    margin:0;
                                    font-size:14px;
                                    line-height:1.8;
                                    color:#6b7280;
                                ">
                                        Our team will review your hotel
                                        information. Once your property has
                                        been verified, it can be made available
                                        to guests through SafeNest.
                                    </p>

                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>


                <!-- Status -->
                <tr>
                    <td style="padding:24px 35px 0;">

                        <table width="100%" cellpadding="0" cellspacing="0" border="0" style="
                            background:#f9fafb;
                            border:1px solid #e5e7eb;
                            border-radius:10px;
                        ">
                            <tr>
                                <td style="padding:18px 20px;">

                                    <span style="
                                    display:inline-block;
                                    padding:6px 11px;
                                    background:{{ $hotel->is_active ? '#dcfce7' : '#fef3c7' }};
                                    color:{{ $hotel->is_active ? '#166534' : '#92400e' }};
                                    border-radius:20px;
                                    font-size:11px;
                                    font-weight:700;
                                ">
                                        {{ $hotel->is_active ? 'ACTIVE' : 'PENDING REVIEW' }}
                                    </span>

                                    <p style="
                                    margin:10px 0 0;
                                    font-size:13px;
                                    line-height:1.6;
                                    color:#6b7280;
                                ">
                                        Your current hotel status is shown above.
                                    </p>

                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>


                <!-- Dashboard Button -->
                <tr>
                    <td align="center" style="padding:30px 35px 35px;">

                        <a href="{{ route('dashboard') }}" style="
                            display:inline-block;
                            padding:13px 26px;
                            background:#4f46e5;
                            color:#ffffff;
                            text-decoration:none;
                            font-size:14px;
                            font-weight:600;
                            border-radius:10px;
                        ">
                            Go to SafeNest
                        </a>

                    </td>
                </tr>


                <!-- Footer -->
                <tr>
                    <td align="center" style="
                        padding:24px 35px;
                        background:#f9fafb;
                        border-top:1px solid #e5e7eb;
                    ">

                        <img src="cid:safenest-logo" alt="SafeNest" width="150" style="
        display:block;
        width:150px;
        max-width:150px;
        height:auto;
        border:0;
    ">


                        <p style="
                        margin:0;
                        font-size:12px;
                        line-height:1.6;
                        color:#9ca3af;
                    ">
                            Hotel & Resort Booking in Nepal
                        </p>

                        <p style="
                        margin:6px 0 0;
                        font-size:12px;
                        color:#9ca3af;
                    ">
                            {{ config('mail.from.address') }}
                        </p>

                    </td>
                </tr>

            </table>

            </td>
        </tr>
    </table>
</body>

</html>