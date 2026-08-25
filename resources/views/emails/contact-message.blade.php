<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>New Contact Inquiry - SafeNest</title>
</head>

<body style="
    margin:0;
    padding:0;
    width:100%;
    background-color:#f5f7fb;
    font-family:Arial, Helvetica, sans-serif;
    color:#111827;
">

    <!-- Main Wrapper -->
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="
            width:100%;
            margin:0;
            padding:0;
            background-color:#f5f7fb;
        ">
        <tr>
            <td align="center" style="padding:40px 15px;">

                <!-- Email Container -->
                <table width="650" cellpadding="0" cellspacing="0" border="0" style="
                        width:100%;
                        max-width:650px;
                        background:#ffffff;
                        border:1px solid #e5e7eb;
                        border-radius:18px;
                        overflow:hidden;
                    ">

                    <!-- ================================= -->
                    <!-- HEADER -->
                    <!-- ================================= -->

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
<img
    src="cid:safenest-logo"
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
                                            CONTACT
                                        </span>

                                    </td>

                                </tr>
                            </table>

                        </td>
                    </tr>


                    <!-- ================================= -->
                    <!-- HERO -->
                    <!-- ================================= -->

                    <tr>
                        <td style="padding:32px 35px 10px;">

                            <h1 style="
                                margin:0;
                                font-size:26px;
                                line-height:1.3;
                                font-weight:700;
                                color:#111827;
                            ">
                                New Contact Inquiry
                            </h1>

                            <p style="
                                margin:10px 0 0;
                                font-size:14px;
                                line-height:1.6;
                                color:#6b7280;
                            ">
                                Someone has contacted the SafeNest team through your website.
                            </p>

                        </td>
                    </tr>


                    <!-- ================================= -->
                    <!-- SENDER INFORMATION -->
                    <!-- ================================= -->

                    <tr>
                        <td style="padding:25px 35px 0;">

                            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="
                                    background:#f9fafb;
                                    border:1px solid #e5e7eb;
                                    border-radius:14px;
                                ">

                                <tr>
                                    <td style="padding:22px;">

                                        <!-- Section Title -->
                                        <div style="
                                            margin-bottom:18px;
                                            font-size:15px;
                                            font-weight:700;
                                            color:#111827;
                                        ">

                                            <span style="
                                                display:inline-block;
                                                width:8px;
                                                height:8px;
                                                margin-right:8px;
                                                background:#4f46e5;
                                                border-radius:50%;
                                            "></span>

                                            Sender Information

                                        </div>


                                        <!-- Name -->
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                            style="margin-bottom:10px;">
                                            <tr>

                                                <td width="100" style="
                                                        font-size:12px;
                                                        font-weight:600;
                                                        color:#9ca3af;
                                                    ">
                                                    NAME
                                                </td>

                                                <td style="
                                                    font-size:14px;
                                                    font-weight:600;
                                                    color:#111827;
                                                ">
                                                    {{ $name }}
                                                </td>

                                            </tr>
                                        </table>


                                        <!-- Email -->
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                            style="margin-bottom:10px;">
                                            <tr>

                                                <td width="100" style="
                                                        font-size:12px;
                                                        font-weight:600;
                                                        color:#9ca3af;
                                                    ">
                                                    EMAIL
                                                </td>

                                                <td>

                                                    <a href="mailto:{{ $email }}" style="
                                                            font-size:14px;
                                                            font-weight:600;
                                                            color:#4f46e5;
                                                            text-decoration:none;
                                                        ">
                                                        {{ $email }}
                                                    </a>

                                                </td>

                                            </tr>
                                        </table>


                                        <!-- Phone -->
                                        @if($phone)

                                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                <tr>

                                                    <td width="100" style="
                                                                font-size:12px;
                                                                font-weight:600;
                                                                color:#9ca3af;
                                                            ">
                                                        PHONE
                                                    </td>

                                                    <td>

                                                        <a href="tel:{{ $phone }}" style="
                                                                    font-size:14px;
                                                                    font-weight:600;
                                                                    color:#111827;
                                                                    text-decoration:none;
                                                                ">
                                                            {{ $phone }}
                                                        </a>

                                                    </td>

                                                </tr>
                                            </table>

                                        @endif

                                    </td>
                                </tr>

                            </table>

                        </td>
                    </tr>


                    <!-- ================================= -->
                    <!-- PURPOSE -->
                    <!-- ================================= -->

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
                                            margin-bottom:7px;
                                            font-size:11px;
                                            font-weight:700;
                                            letter-spacing:.08em;
                                            text-transform:uppercase;
                                            color:#6366f1;
                                        ">
                                            Purpose / Subject
                                        </div>

                                        <div style="
                                            font-size:16px;
                                            line-height:1.5;
                                            font-weight:600;
                                            color:#111827;
                                        ">
                                            {{ $subject }}
                                        </div>

                                    </td>

                                </tr>
                            </table>

                        </td>
                    </tr>


                    <!-- ================================= -->
                    <!-- MESSAGE -->
                    <!-- ================================= -->

                    <tr>
                        <td style="padding:28px 35px 0;">

                            <div style="
                                margin-bottom:10px;
                                font-size:15px;
                                font-weight:700;
                                color:#111827;
                            ">
                                Message
                            </div>


                            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="
                                    background:#f9fafb;
                                    border:1px solid #e5e7eb;
                                    border-radius:14px;
                                ">
                                <tr>

                                    <td style="
                                        padding:22px;
                                        font-size:14px;
                                        line-height:1.8;
                                        color:#374151;
                                    ">

                                        {!! nl2br(e($contactMessage)) !!}

                                    </td>

                                </tr>
                            </table>

                        </td>
                    </tr>


                    <!-- ================================= -->
                    <!-- REPLY BUTTON -->
                    <!-- ================================= -->

                    <tr>
                        <td align="center" style="padding:30px 35px 35px;">

                            <a href="mailto:{{ $email }}" style="
                                    display:inline-block;
                                    padding:13px 25px;
                                    background:#4f46e5;
                                    color:#ffffff;
                                    text-decoration:none;
                                    font-size:14px;
                                    font-weight:600;
                                    border-radius:10px;
                                ">
                                Reply to {{ $name }}
                            </a>

                        </td>
                    </tr>


                    <!-- ================================= -->
                    <!-- FOOTER -->
                    <!-- ================================= -->

                    <tr>
                        <td align="center" style="
                                padding:24px 35px;
                                background:#f9fafb;
                                border-top:1px solid #e5e7eb;
                            ">
<img
    src="cid:safenest-logo"
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