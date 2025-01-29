<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande de Rendez-vous</title>

    <!-- Style -->
    <style>
        /* Corps de la page */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f4f8; /* Couleur de fond gris clair */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Conteneur du formulaire */
        .form-container {
            background: #ffffff; /* Fond blanc pour le formulaire */
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            padding: 30px;
            box-sizing: border-box;
        }

        /* Titre du formulaire */
        h1 {
            text-align: center;
            color: #1e3d58; /* Bleu foncé */
            font-size: 24px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        /* Labels et champs de formulaire */
        label {
            display: block;
            margin-bottom: 10px;
            font-size: 16px;
            color: #1e3d58;
            font-weight: 500;
        }

        input[type="text"],
        input[type="email"],
        select,
        input[type="date"],
        input[type="time"] {
            width: 100%;
            padding: 10px;
            border: 2px solid #d1e1f3; /* Bordure gris clair */
            border-radius: 8px;
            font-size: 16px;
            margin-bottom: 20px;
            transition: border 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        select:focus,
        input[type="date"]:focus,
        input[type="time"]:focus {
            border-color: #4f96d4; /* Bleu clair */
            outline: none;
        }

        /* Bouton de soumission */
        button[type="submit"] {
            background-color: #4f96d4; /* Bleu clair */
            color: #ffffff;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 16px;
            width: 100%;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #1e3d58; /* Bleu foncé au survol */
        }

        /* Message d'erreur */
        .error {
            color: #ff4d4d; /* Rouge pour les erreurs */
            font-size: 14px;
            margin-bottom: 15px;
        }

        /* Message de succès */
        .success {
            color: #28a745; /* Vert pour les succès */
            font-size: 14px;
            margin-bottom: 15px;
        }

        /* Spacing pour les éléments */
        .form-group {
            margin-bottom: 20px;
        }

        /* Espacement entre les champs */
        .form-container input, .form-container select {
            margin-bottom: 20px;
        }

        /* Bordure et style du formulaire */
        .form-container {
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
        }

        /* Animation de transition des champs */
        input[type="text"], input[type="email"], input[type="date"], select, input[type="time"] {
            transition: all 0.3s ease;
        }

        /* Styliser les select options */
        select option {
            padding: 10px;
        }

    </style>
</head>
<body>

    <div class="form-container">
        <h1>Demande de Rendez-vous</h1>

        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('appointment.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="first_name">Prénom</label>
                <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                @error('first_name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="last_name">Nom</label>
                <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                @error('last_name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="reason">Motif du rendez-vous</label>
                <select id="reason" name="reason" required>
                    <option value="Service Gestion" {{ old('reason') == 'Service Gestion' ? 'selected' : '' }}>Service Gestion</option>
                    <option value="Service Contentieux" {{ old('reason') == 'Service Contentieux' ? 'selected' : '' }}>Service Contentieux</option>
                    <option value="Service Budget" {{ old('reason') == 'Service Budget' ? 'selected' : '' }}>Service Budget</option>
                </select>
                @error('reason')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="appointment_date">Date du rendez-vous</label>
                <input type="date" id="appointment_date" name="appointment_date" value="{{ old('appointment_date') }}" required>
                @error('appointment_date')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="time_slot">Heure du rendez-vous</label>
                <select id="time_slot" name="time_slot" required>
                    <option value="9h à 10h" {{ old('time_slot') == '9h à 10h' ? 'selected' : '' }}>9h à 10h</option>
                    <option value="10h à 11h" {{ old('time_slot') == '10h à 11h' ? 'selected' : '' }}>10h à 11h</option>
                    <option value="11h à 12h" {{ old('time_slot') == '11h à 12h' ? 'selected' : '' }}>11h à 12h</option>
                </select>
                @error('time_slot')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">Soumettre</button>
        </form>
    </div>

</body>
</html>
