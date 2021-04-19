@extends('layouts/app')

@section('content')
    <div class="container">

        <div class="d-flex justify-content-around align-items-center my-4">
            <h1 class="my-4 text-center titre-annonces">Nos annonces</h1>

            <a href="/show/creer" class="btn btn-primary">Créer une annonce</a>
        </div>

        {{-- old() permet de récupérer le withInput(). Ce sont les données de la requête précédente. --}}
        @if (old())
            <div class="alert alert-success">
                L'annonce {{ old('title') }} a été ajoutée avec succès.
            </div>
        @endif

        @if (session('message'))
            <div class="alert alert-sucess">
                {{ session('message') }}
            </div>
        @endif

        <div class="row">
            @foreach ($properties as $property)
                <div class="col-lg-3">
                    <div class="card text-center my-2">
                        <img src="{{ $property->image }}" alt="">
                        <div class="card-body">
                            <h5 class="card-title">{{ $property->title }}</h5>
                            <p class="card-text">{{ Str::limit($property->description, 25) }}</p>
                            <a href="/show/{{ $property->id }}" class="btn btn-primary">Voir l'annonce</a>
                            <a href="/show/editer/{{ $property->id }}" class="btn btn-primary">Editer</a>

                            <form action="/show/{{ $property->id }}"
                                    method="POST"
                                    onsubmit="return confirm('Voulez-vous supprimer cette annonce ?')"
                                    class="my-2">

                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">Supprimer</button>
                            </form>

                        </div>
                        <div class="card-footer text-muted">
                            {{ number_format($property->price) }} €
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection