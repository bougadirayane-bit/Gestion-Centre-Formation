
@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Détails du stagiaire</h1>

    <p><strong>ID :</strong> {{ $stagiaire->id }}</p>
    <p><strong>Nom :</strong> {{ $stagiaire->nom }}</p>
    <p><strong>Prénom :</strong> {{ $stagiaire->prenom }}</p>
    <p><strong>Email :</strong> {{ $stagiaire->email }}</p>
    <p><strong>Téléphone :</strong> {{ $stagiaire->telephone }}</p>
    <p><strong>Adresse :</strong> {{ $stagiaire->adresse }}</p>
    <p><strong>Date de naissance :</strong> {{ $stagiaire->date_naissance }}</p>

    <a href="{{ route('stagiaires.index') }}">Retour</a>
    <a href="{{ route('stagiaires.edit', $stagiaire->id) }}">Modifier</a>
</div>

@endsection
