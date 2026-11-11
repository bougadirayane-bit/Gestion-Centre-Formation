@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Détails de la filière</h1>

    <div>
        <p><strong>ID :</strong> {{ $filiere->id }}</p>
        <p><strong>Nom :</strong> {{ $filiere->nom }}</p>
        <p><strong>Description :</strong> {{ $filiere->description }}</p>
        <p><strong>Durée :</strong> {{ $filiere->duree }}</p>
    </div>

    <a href="{{ route('filieres.index') }}">
        Retour à la liste
    </a>

    <a href="{{ route('filieres.edit', $filiere->id) }}">
        Modifier
    </a>
</div>

@endsection
