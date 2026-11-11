
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Filières</h1>

    <a href="{{ route('filieres.create') }}" class="btn btn-primary mb-3">
        Ajouter une Filière
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
                <th>Description</th>
                <th>Durée</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($filieres as $filiere)
                <tr>
                    <td>{{ $filiere->id }}</td>
                    <td>{{ $filiere->nom }}</td>
                    <td>{{ $filiere->description }}</td>
                    <td>{{ $filiere->duree }}</td>
                    <td>
                        <a href="{{ route('filieres.show', $filiere->id) }}"
                           class="btn btn-info btn-sm">Voir</a>

                        <a href="{{ route('filieres.edit', $filiere->id) }}"
                           class="btn btn-warning btn-sm">Modifier</a>

                        <form action="{{ route('filieres.destroy', $filiere->id) }}"
                              method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Voulez-vous supprimer cette filière ?')">
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Aucune filière disponible.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
