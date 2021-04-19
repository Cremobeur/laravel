@extends('layouts.app')

@section('content')

    <div class="container">

        <h2>Formulaire en POST</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/show/creer" method="POST" enctype="multipart/form-data">

            {{-- Génére une balise avec le token CSRF. Ce token permet de protéger le site contre les attaques
                CSRF. Laravel va simplement vérifier que le token envoyé correspond à celui de la personne qui est
                actuellement sur le site --}}
            @csrf

            <div>
                <label for="title">Titre</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}">

                @error('title')
                    <span>{{ $message }}</span>
                @enderror

            </div>

            <div>
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="my-2">
            </div>
            
            <div>
                <label for="description">Description</label>
                <textarea name="description" class="form-control" value="{{ old('description') }}"></textarea>
            </div>
            <div>
                <label for="price">Prix</label>
                <input type="text" name="price" class="form-control" value="{{ old('price') }}">
            </div>
            <div class="form-check">
                <input type="checkbox" name="sold" class="form-check-input" {{ old('sold') ? 'checked' : '' }}>
                <label for="sold">Vendu ?</label>
            </div>

            <button class="btn btn-primary">Ajouter</button>

        </form>

    </div>

@endsection