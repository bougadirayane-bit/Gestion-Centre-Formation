@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Détails de l'inscription</h1>

    <div>
        <p>
            <strong>ID :</strong>
            {{ $inscription->id }}
        </p>

        <p>
            <strong>Stagiaire :</strong>
            {{ $inscription->stagiaire->nom }}
            {{ $inscription->stagiaire->prenom }}
        </p>

        <p>
            <strong>Filière :</strong>
            {{ $inscription->filiere->nom }}
        </p>

        <p>
            <strong>Date d'inscription :</strong>
            {{ $inscription->date_inscription }}
        </p>

        <p>
            <strong>Statut :</strong>
            {{ $inscription->statut }}
        </p>
    </div>

    <a href="{{ route('inscriptions.index') }}">
        Retour à la liste
    </a>

    <a href="{{ route('inscriptions.edit', $inscription->id) }}">
        Modifier
    </a>

</div>

@endsection
