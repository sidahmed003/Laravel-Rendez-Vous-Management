<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rendez-vous Confirmé</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            color: #1e3d58;
            margin: 0;
            padding: 0;
            font-size: 14px;
        }

        /* Titre principal */
        h1 {
            text-align: center;
            color: #4f96d4;
            font-size: 24px;
            margin-top: 30px;
        }

        /* Tableau de données */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #d1e1f3;
        }

        th {
            background-color: #4f96d4;
            color: #ffffff;
        }

        td {
            background-color: #fff;
        }

        /* Signature */
        .signature {
            text-align: right;
            margin-top: 40px;
            font-weight: bold;
            font-size: 18px;
            margin-right: 30px;
        }

        /* Espacement de contenu */
        p {
            text-align: center;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <h1>Confirmation de Rendez-vous</h1>

    <p>Votre rendez-vous a été confirmé avec succès. Voici les détails :</p>

    <!-- Tableau des informations de l'utilisateur -->
    <table>
        <tr>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Motif</th>
            <th>Date</th>
            <th>Créneau Horaire</th>
        </tr>
        <tr>
            <td>{{ $appointment->first_name }}</td>
            <td>{{ $appointment->last_name }}</td>
            <td>{{ $appointment->email }}</td>
            <td>{{ $appointment->reason }}</td>
            <td>{{ $appointment->appointment_date }}</td>
            <td>{{ $appointment->time_slot }}</td>
        </tr>
    </table>

    <!-- Signature -->
    <div class="signature">
        <p>HOUAS COMPANY</p>
    </div>
</body>
</html>
