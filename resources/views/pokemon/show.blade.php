@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mb-1 mx-auto" style="max-width: 1000px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ $pokemon->photo ? Storage::url($pokemon->photo) : 'https://placehold.co/200' }}" class="img-fluid rounded-start" alt="{{ $pokemon->name }}">
                </div>
                <div class="col-md-8">
                    <div class="card-body p-2">
                        <h4 class="card-text mb-2"><strong>ID:</strong> {{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }}</h4>
                        <p class="card-title mb-2"><strong>Name: {{ $pokemon->name }}</strong></p>
                        <p class="card-text mb-2"><strong>Species:</strong> {{ $pokemon->species }}</p>
                        <p class="card-text mb-2"><strong>Weight (kg):</strong> {{ $pokemon->weight }}</p>
                        <p class="card-text mb-2"><strong>Height (m):</strong> {{ $pokemon->height }}</p>
                        <p class="card-text mb-2"><strong>HP:</strong> {{ $pokemon->hp }}</p>
                        <p class="card-text mb-2"><strong>Attack:</strong> {{ $pokemon->attack }}</p>
                        <p class="card-text mb-2"><strong>Defense:</strong> {{ $pokemon->defense }}</p>
                        <p class="card-text mb-2"><strong>Legendary:</strong> {{ $pokemon->is_legendary ? 'Yes' : 'No' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
