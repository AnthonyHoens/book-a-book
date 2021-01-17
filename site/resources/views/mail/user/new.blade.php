<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Création de compte</title>
</head>
<body>
    <h1>
        Bienvenue sur le site de {{ config('app.name') }}
    </h1>
    <h2>
        Vous venez de créez votre compte
    </h2>
    <p>
        Félicitations {{ $user->first_name . ' ' . $user->name }},<br>
        vous pouvez profiter pleinement de votre expérience sur le site de {{ config('app.name') }}.
    </p>

</body>
</html>
