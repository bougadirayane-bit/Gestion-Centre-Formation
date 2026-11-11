@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="mb-4">Ajouter une Inscription</h1>

    <form action="{{ route('inscriptions.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Stagiaire</label>

            <select name="stagiaire_id" class="form-control" required>
                <option value="">Choisir un stagiaire</option>

                @foreach($stagiaires as $stagiaire)
                    <option value="{{ $stagiaire->id }}"
                        {{ old('stagiaire_id') == $stagiaire->id ? 'selected' : '' }}>
                        {{ $stagiaire->nom }} {{ $stagiaire->prenom }}
                    </option>
                @endforeach
            </select>

            @error('stagiaire_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Filière</label>

            <select name="filiere_id" class="form-control" required>
                <option value="">Choisir une filière</option>

                @foreach($filieres as $filiere)
                    <option value="{{ $filiere->id }}"
                        {{ old('filiere_id') == $filiere->id ? 'selected' : '' }}>
                        {{ $filiere->nom }}
                    </option>
                @endforeach
            </select>

            @error('filiere_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Date d'inscription</label>

            <input type="date"
                   name="date_inscription"
                   class="form-control"
                   value="{{ old('date_inscription') }}"
                   required>

            @error('date_inscription')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Statut</label>

            <select name="statut" class="form-control" required>
                <option value="en_attente"
                    {{ old('statut') == 'en_attente' ? 'selected' : '' }}>
                    En attente
                </option>

                <option value="acceptee"
                    {{ old('statut') == 'acceptee' ? 'selected' : '' }}>
                    Acceptée
                </option>

                <option value="refusee"
                    {{ old('statut') == 'refusee' ? 'selected' : '' }}>
                    Refusée
                </option>
            </select>

            @error('statut')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">
            Enregistrer
        </button>

        <a href="{{ route('inscriptions.index') }}"
           class="btn btn-secondary">
            Retour
        </a>

    </form>
</div>

@endsection