{{--On va étendre le fichier ressources/views/layouts/app.blade.php--}}
{{--Laravel comprend que layouts.app est layouts/app--}}
@extends('layouts.app')

@section('title')
    About - @parent
@endsection

{{--On met le contenu suivant dans le yield content--}}
@section('content')

<div class="container">

    <h1>Hello {{ $name }} </h1>

    <ul>
        @foreach ($bibis as $bibi)
            <li>
                {{ $loop->index }} {{ $bibi }}
            </li> 
        @endforeach
    </ul>

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

</div>

@endsection