@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Stagiaires</h1>

    <a href="{{ route('stagiaires.create') }}" class="btn btn-primary mb-3">
        Ajouter un Stagiaire
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
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($stagiaires as $stagiaire)
                <tr>
                    <td>{{ $stagiaire->id }}</td>
                    <td>{{ $stagiaire->nom }}</td>
                    <td>{{ $stagiaire->prenom }}</td>
                    <td>{{ $stagiaire->email }}</td>
                    <td>{{ $stagiaire->telephone }}</td>
                    <td>
                        <a href="{{ route('stagiaires.show', $stagiaire->id) }}"
                           class="btn btn-info btn-sm">Voir</a>

                        <a href="{{ route('stagiaires.edit', $stagiaire->id) }}"
                           class="btn btn-warning btn-sm">Modifier</a>

                        <form action="{{ route('stagiaires.destroy', $stagiaire->id) }}"
                              method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Voulez-vous supprimer ce stagiaire ?')">
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Aucun stagiaire disponible.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <form action="{{ route('stagiaires.index') }}" method="GET" class="mb-3">
    <div class="input-group">
        <input
            type="text"
            name="search"
            class="form-control"
            placeholder="Rechercher un stagiaire..."
            value="{{ $search ?? '' }}"
        >

        <button type="submit" class="btn btn-primary">
            Rechercher
        </button>

        @if(!empty($search))
            <a href="{{ route('stagiaires.index') }}" class="btn btn-secondary">
                Réinitialiser
            </a>
        @endif
    </div>
</form>
</div>
@endsection
