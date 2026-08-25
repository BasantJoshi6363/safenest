<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Welcome to SafeNest</title>
</head>

<body style="
    margin:0;
    padding:0;
    width:100%;
    background-color:#f5f7fb;
    font-family:Arial, Helvetica, sans-serif;
    color:#111827;
">

<table
    width="100%"
    cellpadding="0"
    cellspacing="0"
    border="0"
    style="
        width:100%;
        margin:0;
        padding:0;
        background-color:#f5f7fb;
    "
>
    <tr>
        <td align="center" style="padding:40px 15px;">

            <!-- Main Container -->
            <table
                width="650"
                cellpadding="0"
                cellspacing="0"
                border="0"
                style="
                    width:100%;
                    max-width:650px;
                    background:#ffffff;
                    border:1px solid #e5e7eb;
                    border-radius:18px;
                    overflow:hidden;
                "
            >

                <!-- Header -->
                <tr>
                    <td style="
                        padding:30px 35px;
                        background:#ffffff;
                        border-bottom:1px solid #eef0f4;
                    ">

                        <table
                            width="100%"
                            cellpadding="0"
                            cellspacing="0"
                            border="0"
                        >
                            <tr>

                                <!-- Logo -->
                                <td align="left">

                                    <img
                                        src="{{ $message->embed(public_path('images/tab_logo.png')) }}"
                                        alt="SafeNest"
                                        width="150"
                                        style="
                                            display:block;
                                            width:150px;
                                            max-width:150px;
                                            height:auto;
                                            border:0;
                                        "
                                    >

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
                                        WELCOME
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
                            Welcome to SafeNest, {{ $user->name }}! 👋
                        </h1>

                        <p style="
                            margin:12px 0 0;
                            font-size:15px;
                            line-height:1.7;
                            color:#6b7280;
                        ">
                            Your SafeNest account has been successfully created.
                            We're happy to have you with us.
                        </p>

                    </td>
                </tr>


                <!-- Welcome Card -->
                <tr>
                    <td style="padding:20px 35px 0;">

                        <table
                            width="100%"
                            cellpadding="0"
                            cellspacing="0"
                            border="0"
                            style="
                                background:#f9fafb;
                                border:1px solid #e5e7eb;
                                border-radius:14px;
                            "
                        >
                            <tr>
                                <td style="padding:24px;">

                                    <div style="
                                        margin-bottom:15px;
                                        font-size:15px;
                                        font-weight:700;
                                        color:#111827;
                                    ">
                                        Your account is ready
                                    </div>

                                    <p style="
                                        margin:0;
                                        font-size:14px;
                                        line-height:1.8;
                                        color:#4b5563;
                                    ">
                                        You can now use your SafeNest account
                                        to explore hotels and resorts, manage
                                        your bookings, and enjoy a smoother
                                        travel experience in Nepal.
                                    </p>

                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>


                <!-- Account Information -->
                <tr>
                    <td style="padding:24px 35px 0;">

                        <table
                            width="100%"
                            cellpadding="0"
                            cellspacing="0"
                            border="0"
                            style="
                                background:#eef2ff;
                                border-left:4px solid #4f46e5;
                                border-radius:10px;
                            "
                        >
                            <tr>
                                <td style="padding:18px 20px;">

                                    <div style="
                                        margin-bottom:7px;
                                        font-size:11px;
                                        font-weight:700;
                                        letter-spacing:.08em;
                                        text-transform:uppercase;
                                        color:#6366f1;
                                    ">
                                        Account Information
                                    </div>

                                    <p style="
                                        margin:0 0 7px;
                                        font-size:14px;
                                        color:#111827;
                                    ">
                                        <strong>Name:</strong>
                                        {{ $user->name }}
                                    </p>

                                    <p style="
                                        margin:0;
                                        font-size:14px;
                                        color:#111827;
                                    ">
                                        <strong>Email:</strong>
                                        {{ $user->email }}
                                    </p>

                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>


                <!-- Dashboard Button -->
                <tr>
                    <td align="center" style="padding:30px 35px 35px;">

                        <a
                            href="{{ route('dashboard') }}"
                            style="
                                display:inline-block;
                                padding:13px 26px;
                                background:#4f46e5;
                                color:#ffffff;
                                text-decoration:none;
                                font-size:14px;
                                font-weight:600;
                                border-radius:10px;
                            "
                        >
                            Go to SafeNest
                        </a>

                    </td>
                </tr>


                <!-- Footer -->
                <tr>
                    <td
                        align="center"
                        style="
                            padding:24px 35px;
                            background:#f9fafb;
                            border-top:1px solid #e5e7eb;
                        "
                    >

                        <img
                            src="{{ $message->embed(public_path('images/tab_logo.png')) }}"
                            alt="SafeNest"
                            width="120"
                            style="
                                display:block;
                                width:120px;
                                max-width:120px;
                                height:auto;
                                border:0;
                                margin:0 auto 10px;
                            "
                        >

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