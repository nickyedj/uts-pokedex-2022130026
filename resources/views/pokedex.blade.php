@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Pokedex</h1>
        <div class="row">
            @foreach ($pokemon as $pokemons)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <a href="{{ route('pokemon.show', $pokemons) }}">
                            <img src="{{ $pokemons->photo ? Storage::url($pokemons->photo) : 'https://placehold.co/200' }}"
                                class="card-img-top">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('pokemon.show', $pokemons) }}">
                                    {{ $pokemons->name }}
                                </a>
                            </h5>
                            <p class="card-text">
                                <strong>ID: {{ str_pad($pokemons->id, 4, '0', STR_PAD_LEFT) }}</strong><br>
                                <strong>Types:</strong>
                                <span class="badge bg-primary">{{ $pokemons->primary_type }}</span><br>
                                <strong>Power: {{ $pokemons->hp + $pokemons->attack + $pokemons->defense }}</strong><br>
                                <strong>Legendary: {{ $pokemons->is_legendary ? 'Yes' : 'No' }}</strong>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $pokemon->links() }}
    </div>
@endsection
