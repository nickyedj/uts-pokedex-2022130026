@extends('layouts.app')

@section('content')
    <div class="container">
        <main>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <form action="{{ route('pokemon.update',$pokemon) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="row">
                    <div class="col-12">
                        <label class="form-label" for="name">Name</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{old('name',$pokemon->name)}}">
                    </div>
                    <div class="col-6 ">
                        <label class="form-label" for="species">Species</label>
                        <input class="form-control @error('species') is-invalid @enderror" name="species" type="text" id="species" value="{{old('species',$pokemon->species)}}">
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="primary_type">Type</label>
                        <select class="form-control @error('primary_type') is-invalid @enderror" name="primary_type" id="primary_type" required>
                            <option value="">Type</option>
                            <option value="Grass" {{ old('primary_type', $pokemon->primary_type) == 'Grass' ? 'selected' : '' }}>Grass</option>
                            <option value="Fire" {{ old('primary_type', $pokemon->primary_type) == 'Fire' ? 'selected' : '' }}>Fire</option>
                            <option value="Water" {{ old('primary_type', $pokemon->primary_type) == 'Water' ? 'selected' : '' }}>Water</option>
                            <option value="Bug" {{ old('primary_type', $pokemon->primary_type) == 'Bug' ? 'selected' : '' }}>Bug</option>
                            <option value="Normal" {{ old('primary_type', $pokemon->primary_type) == 'Normal' ? 'selected' : '' }}>Normal</option>
                            <option value="Poison" {{ old('primary_type', $pokemon->primary_type) == 'Poison' ? 'selected' : '' }}>Poison</option>
                            <option value="Electric" {{ old('primary_type', $pokemon->primary_type) == 'Electric' ? 'selected' : '' }}>Electric</option>
                            <option value="Ground" {{ old('primary_type', $pokemon->primary_type) == 'Ground' ? 'selected' : '' }}>Ground</option>
                            <option value="Fairy" {{ old('primary_type', $pokemon->primary_type) == 'Fairy' ? 'selected' : '' }}>Fairy</option>
                            <option value="Fighting" {{ old('primary_type', $pokemon->primary_type) == 'Fighting' ? 'selected' : '' }}>Fighting</option>
                            <option value="Psychic" {{ old('primary_type', $pokemon->primary_type) == 'Psychic' ? 'selected' : '' }}>Psychic</option>
                            <option value="Rock" {{ old('primary_type', $pokemon->primary_type) == 'Rock' ? 'selected' : '' }}>Rock</option>
                            <option value="Ghost" {{ old('primary_type', $pokemon->primary_type) == 'Ghost' ? 'selected' : '' }}>Ghost</option>
                            <option value="Ice" {{ old('primary_type', $pokemon->primary_type) == 'Ice' ? 'selected' : '' }}>Ice</option>
                            <option value="Dragon" {{ old('primary_type', $pokemon->primary_type) == 'Dragon' ? 'selected' : '' }}>Dragon</option>
                            <option value="Dark" {{ old('primary_type', $pokemon->primary_type) == 'Dark' ? 'selected' : '' }}>Dark</option>
                            <option value="Steel" {{ old('primary_type', $pokemon->primary_type) == 'Steel' ? 'selected' : '' }}>Steel</option>
                            <option value="Flying" {{ old('primary_type', $pokemon->primary_type) == 'Flying' ? 'selected' : '' }}>Flying</option>
                        </select>
                    </div>

                    <div class="col-6 ">
                        <label class="form-label" for="weight">Weight (kg)</label>
                        <input class="form-control @error('weight') is-invalid @enderror" name="weight" type="number" id="weight" step="any" value="{{old('weight',$pokemon->weight)}}">
                    </div>
                    <div class="col-6 ">
                        <label class="form-label" for="height">Height (m)</label>
                        <input class="form-control @error('height') is-invalid @enderror" name="height" type="number" id="height" step="any" value="{{old('height',$pokemon->height)}}">
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="hp">HP</label>
                        <input class="form-control @error('hp') is-invalid @enderror" name="hp" type="number" id="hp" value="{{old('hp',$pokemon->hp)}}">
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="attack">Attack</label>
                        <input class="form-control @error('attack') is-invalid @enderror" name="attack" type="number" id="attack" value="{{old('attack',$pokemon->attack)}}">
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="defense">Defense</label>
                        <input class="form-control @error('defense') is-invalid @enderror" name="defense" type="number" id="defense" value="{{old('defense',$pokemon->defense)}}">
                    </div>
                    <div class="col-6">
                        <label class="form-label">Is Legendary</label>
                        <div>
                            <input type="checkbox" name="is_legendary" id="is_legendary" value="1" {{ old('is_legendary', $pokemon->is_legendary) ? 'checked' : '' }}>
                            <label for="is_legendary">Yes</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="photo">Photo</label>
                        <input class="form-control @error('photo') is-invalid @enderror" name="photo" type="file" id="photo" >
                        <img src="{{Storage::url($pokemon->photo)}}" class="img-fluid">

                    </div>
                    <button class="btn btn-primary mt-3" type="submit"> Update </button>
                </div>
            </form>
        </main>
    </div>
@endsection
