<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Commande</title>
</head>
<body>
<h1>
    Commande
</h1>
<h2>
    Commande de {{ $order->user->first_name . ' ' . $order->user->name }}<br>
    Numéro de commande: {{ $order->order_number }}
</h2>
<p>
    {{ $order->user->first_name . ' ' . $order->user->name }} vient de cloturer sa commande, elle est en attente de paiement.
</p>

</body>
</html>
