
@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Ajouter une Filière</h1>

    <form action="{{ route('filieres.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control"
                   value="{{ old('nom') }}" required>
            @error('nom')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Durée</label>
            <input type="text" name="duree" class="form-control"
                   value="{{ old('duree') }}" required>
            @error('duree')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">
            Enregistrer
        </button>

        <a href="{{ route('filieres.index') }}" class="btn btn-secondary">
            Retour
        </a>
    </form>
</div>
@endsection
