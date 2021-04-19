@extends('layouts.app')

@section('content')

    <div class="container">

        <h2>Modifier {{ $property->title }} </h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="" method="POST">

            {{-- Génére une balise avec le token CSRF. Ce token permet de protéger le site contre les attaques
                CSRF. Laravel va simplement vérifier que le token envoyé correspond à celui de la personne qui est
                actuellement sur le site --}}
            @csrf

            @method('put')

            <div>
                <label for="title">Titre</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') ?? $property->title }}">

                @error('title')
                    <span>{{ $message }}</span>
                @enderror

            </div>
            
            <div>
                <label for="description">Description</label>
                <textarea name="description" class="form-control">{{ old('description')  ?? $property->description }}</textarea>
            </div>
            <div>
                <label for="price">Prix</label>
                <input type="text" name="price" class="form-control" value="{{ old('price') ?? $property->price }}">
            </div>
            <div class="form-check">
                <input type="checkbox" name="sold" class="form-check-input" {{ old('sold') ? 'checked' : '' }}>
                <label for="sold">Vendu ?</label>
            </div>

            <button class="btn btn-primary">Confirmer</button>

        </form>

    </div>

@endsection