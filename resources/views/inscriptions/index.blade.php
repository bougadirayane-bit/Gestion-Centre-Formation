
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Inscriptions</h1>

    <a href="{{ route('inscriptions.create') }}" class="btn btn-primary mb-3">
        Ajouter une Inscription
    </a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Stagiaire</th>
                <th>Filière</th>
                <th>Date d'inscription</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($inscriptions as $inscription)
                <tr>
                    <td>{{ $inscription->id }}</td>
                    <td>
                        {{ $inscription->stagiaire->nom }}
                        {{ $inscription->stagiaire->prenom }}
                    </td>
                    <td>{{ $inscription->filiere->nom }}</td>
                    <td>{{ $inscription->date_inscription }}</td>
                    <td>{{ $inscription->statut }}</td>
                    <td>
                        <a href="{{ route('inscriptions.show', $inscription->id) }}"
                           class="btn btn-info btn-sm">Voir</a>

                        <a href="{{ route('inscriptions.edit', $inscription->id) }}"
                           class="btn btn-warning btn-sm">Modifier</a>

                        <form action="{{ route('inscriptions.destroy', $inscription->id) }}"
                              method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Voulez-vous supprimer cette inscription ?')">
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Aucune inscription disponible.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
