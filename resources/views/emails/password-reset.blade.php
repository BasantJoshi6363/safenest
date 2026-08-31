<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password - SafeNest</title>
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
                                        background:#fee2e2;
                                        color:#dc2626;
                                        border-radius:20px;
                                        font-size:11px;
                                        font-weight:700;
                                    ">
                                        SECURITY
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
                            font-size:26px;
                            line-height:1.3;
                            font-weight:700;
                            color:#111827;
                        ">
                            Reset Your Password 🔐
                        </h1>

                        <p style="
                            margin:12px 0 0;
                            font-size:15px;
                            line-height:1.7;
                            color:#6b7280;
                        ">
                            You are receiving this email because we received a password reset request for your account.
                        </p>
                    </td>
                </tr>

                <!-- Reset Action Card -->
                <tr>
                    <td style="padding:15px 35px 0;">
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
                                <td align="center" style="padding:28px 24px;">
                                    <p style="
                                        margin:0 0 20px;
                                        font-size:14px;
                                        color:#4b5563;
                                    ">
                                        Click the button below to reset your SafeNest password:
                                    </p>

                                    <!-- Reset Button -->
                                    <a
                                        href="{{ $url }}"
                                        style="
                                            display:inline-block;
                                            padding:13px 28px;
                                            background:#4f46e5;
                                            color:#ffffff;
                                            text-decoration:none;
                                            font-size:14px;
                                            font-weight:600;
                                            border-radius:10px;
                                        "
                                    >
                                        Reset Password
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Expiration Warning -->
                <tr>
                    <td style="padding:24px 35px 0;">
                        <table
                            width="100%"
                            cellpadding="0"
                            cellspacing="0"
                            border="0"
                            style="
                                background:#fffbeb;
                                border-left:4px solid #f59e0b;
                                border-radius:10px;
                            "
                        >
                            <tr>
                                <td style="padding:16px 20px;">
                                    <p style="
                                        margin:0;
                                        font-size:13px;
                                        line-height:1.6;
                                        color:#92400e;
                                    ">
                                        <strong>Note:</strong> This password reset link will expire in <strong>{{ $count ?? 60 }} minutes</strong>. If you did not request a password reset, no further action is required.
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Troubleshooting Link -->
                <tr>
                    <td style="padding:24px 35px 30px;">
                        <p style="
                            margin:0;
                            font-size:12px;
                            line-height:1.6;
                            color:#9ca3af;
                            word-break:break-all;
                        ">
                            If you are having trouble clicking the "Reset Password" button, copy and paste the URL below into your web browser:
                            <br>
                            <a href="{{ $url }}" style="color:#4f46e5; text-decoration:underline;">{{ $url }}</a>
                        </p>
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