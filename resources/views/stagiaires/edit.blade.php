
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier un Stagiaire</h1>

    <form action="{{ route('stagiaires.update', $stagiaire->id) }}"
          method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control"
                   value="{{ old('nom', $stagiaire->nom) }}" required>
        </div>

        <div class="mb-3">
            <label>Prénom</label>
            <input type="text" name="prenom" class="form-control"
                   value="{{ old('prenom', $stagiaire->prenom) }}" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control"
                   value="{{ old('email', $stagiaire->email) }}" required>
        </div>

        <div class="mb-3">
            <label>Téléphone</label>
            <input type="text" name="telephone" class="form-control"
                   value="{{ old('telephone', $stagiaire->telephone) }}" required>
        </div>

        <div class="mb-3">
            <label>Adresse</label>
            <textarea name="adresse" class="form-control">{{ old('adresse', $stagiaire->adresse) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Date de naissance</label>
            <input type="date" name="date_naissance"
                   class="form-control"
                   value="{{ old('date_naissance', $stagiaire->date_naissance) }}">
        </div>

        <button type="submit" class="btn btn-primary">
            Modifier
        </button>

        <a href="{{ route('stagiaires.index') }}"
           class="btn btn-secondary">Retour</a>
    </form>
</div>
@endsection
