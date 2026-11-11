@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier une Filière</h1>

    <form action="{{ route('filieres.update', $filiere->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input
                type="text"
                id="nom"
                name="nom"
                class="form-control"
                value="{{ old('nom', $filiere->nom) }}"
                required
            >

            @error('nom')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea
                id="description"
                name="description"
                class="form-control"
                rows="4"
            >{{ old('description', $filiere->description) }}</textarea>

            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            Modifier
        </button>

        <a href="{{ route('filieres.index') }}" class="btn btn-secondary">
            Annuler
        </a>
    </form>
</div>
@endsection