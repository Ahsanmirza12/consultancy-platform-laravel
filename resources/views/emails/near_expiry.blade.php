<!DOCTYPE html>
<html>
<head>
    <title>Subscription Expiry Alert</title>
</head>
<body>
    <h2>Dear Admin,</h2>
    <p>The following subscriptions are about to expire in 2 days:</p>
    <ul>
        @foreach ($expiringUsers as $user)
            <li>
                <strong>Name:</strong> {{ $user->first_name }} <br>
                <strong>Email:</strong> {{ $user->email }} <br>
                <strong>Days Left:</strong> {{ $user->days_left }}
            </li>
            <hr>
        @endforeach
    </ul>

    <p>Please take necessary actions.</p>
</body>
</html>
