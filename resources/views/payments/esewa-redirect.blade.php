<!DOCTYPE html>
<html>
<body onload="document.forms[0].submit()">
    <form method="POST" action="{{ $action }}">
        @foreach($data as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach
    </form>
    <p class="text-center mt-10 text-gray-500">Redirecting to eSewa...</p>
</body>
</html>