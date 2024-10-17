@extends('layouts.app')

@section('content')
    <div class="container">
    <a class="btn btn-primary" href="{{ route('pokemon.create') }}"><strong>+</strong></a>
    <main>
        <table class="table table-striped">
            <thead>
                <th>#ID</th>
                <th>Name</th>
                <th>Species</th>
                <th>Type</th>
                <th>Power</th>
                <th>Legendary</th>
                <th>Photo</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                @foreach ($pokemon as $pokemons)
                    <tr>
                        <td>{{ str_pad($pokemons->id, 4, '0', STR_PAD_LEFT) }}</td>
                        <td>
                            <a href="{{ route('pokemon.show', $pokemons) }}">{{ $pokemons->name }}</a>
                        </td>
                        <td>{{ $pokemons->species }}</td>
                        <td>{{ $pokemons->primary_type }}</td>
                        <td>{{ $pokemons->hp + $pokemons->attack + $pokemons->defense }}</td>
                        <td>{{ $pokemons->is_legendary ? 'Yes' : 'No' }}</td>
                        <td><a href="{{ route('pokemon.show', $pokemons) }}"><img src="{{ Storage::url($pokemons->photo) }}" class="img-thumbnail" style="max-width: 75px;"></a></td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('pokemon.edit', $pokemons) }}">Edit</a>
                            <form action="{{ route('pokemon.destroy', $pokemons) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
            {{ $pokemon->links() }}
    </main>
</div>

@endsection
