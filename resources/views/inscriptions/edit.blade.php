
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier une Inscription</h1>

    <form action="{{ route('inscriptions.update', $inscription->id) }}"
          method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Stagiaire</label>
            <select name="stagiaire_id" class="form-control" required>
                @foreach($stagiaires as $stagiaire)
                    <option value="{{ $stagiaire->id }}"
                        {{ $inscription->stagiaire_id == $stagiaire->id ? 'selected' : '' }}>
                        {{ $stagiaire->nom }} {{ $stagiaire->prenom }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Filière</label>
            <select name="filiere_id" class="form-control" required>
                @foreach($filieres as $filiere)
                    <option value="{{ $filiere->id }}"
                        {{ $inscription->filiere_id == $filiere->id ? 'selected' : '' }}>
                        {{ $filiere->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Date d'inscription</label>
            <input type="date" name="date_inscription"
                   class="form-control"
                   value="{{ $inscription->date_inscription }}"
                   required>
        </div>

        <div class="mb-3">
            <label>Statut</label>
            <select name="statut" class="form-control" required>
                <option value="en_attente" {{ $inscription->statut == 'en_attente' ? 'selected' : '' }}>En attente</option>
                <option value="acceptee" {{ $inscription->statut == 'acceptee' ? 'selected' : '' }}>Acceptée</option>
                <option value="refusee" {{ $inscription->statut == 'refusee' ? 'selected' : '' }}>Refusée</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">
            Modifier
        </button>

        <a href="{{ route('inscriptions.index') }}"
           class="btn btn-secondary">Retour</a>
    </form>
</div>
@endsection
