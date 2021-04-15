<!DOCTYPE html>

<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>About</title>

</head>

<body>

    <h1>Hello Laravel</h1>

    <h2>Blade simplifie le PHP</h2>
    <?php echo date('d/m/Y'); ?>
    {{ date('d/m/Y') }}

    <h2>If en blade</h2>
    @if (1 === 1)
        Je suis un if
    @endif

    <h2>Boucle en blade</h2>
    @for ($i = 0; $i < 10; $i++)
        {{ $i }}
    @endfor

    <h2>Protection XSS en blade</h2>
    {{ '<sript>alert("toto")</script>' }}
    {!! '<h1>Pas de protection XSS</h1>' !!}
    
</body>

</html>