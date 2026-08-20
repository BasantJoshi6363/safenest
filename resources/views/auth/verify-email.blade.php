<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
</head>
<body>

    <h1>Verify Your Email</h1>

    <p>
        Before continuing, please check your email and click the verification link.
    </p>

    @if (session('message'))
        <p style="color: green;">
            {{ session('message') }}
        </p>
    @endif

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf

        <button type="submit">
            Resend Verification Email
        </button>
    </form>

</body>
</html>