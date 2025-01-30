<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation Rendez-vous</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
        }
        h1 {
            color: #1e3d58;
        }
        .confirmation {
            font-size: 20px;
            font-weight: bold;
            margin-top: 30px;
            color: #4f96d4;
        }
    </style>
</head>
<body>

    <h1>RENDEZ-VOUS CONFIRMÉE</h1>

    <p class="confirmation">
        Merci, {{ $appointment->first_name }} {{ $appointment->last_name }}.<br>
        Votre rendez-vous pour le <strong>{{ $appointment->appointment_date }}</strong> à <strong>{{ $appointment->time_slot }}</strong> a été confirmé.
    </p>

</body>
</html>
