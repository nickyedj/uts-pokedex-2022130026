<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
         $this->middleware('auth')->except('show');
     }


     public function index()
{
    $pokemon = Pokemon::paginate(20);
    return view('pokemon.index', compact('pokemon'));
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pokemon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'species'=>'required|string|max:100',
            'primary_type'=>'required|string|max:50',
            'weight'=>'required|numeric|min:0|max:999999',
            'height'=>'required|numeric|min:0|max:999999',
            'hp'=>'required|integer|min:0',
            'attack'=>'required|integer|min:0',
            'defense'=>'required|integer|min:0',
            'is_legendary'=>'boolean',
            'photo'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);
        $pokemon = Pokemon::create($request->all());
        if($request->hasFile('photo')){
            $file=$request->file('photo');
            $fileName = $file->hashName();
            $filePath = $file->storeAs('public',$fileName);
            $pokemon->update(['photo' => $filePath]);
        }
        return redirect()->route('pokemon.index');


    }

    /**
     * Display the specified resource.
     */
   public function show($id)
{
    $pokemon = Pokemon::findOrFail($id);
    return view('pokemon.show', compact('pokemon'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pokemon $pokemon)
    {
        return view('pokemon.edit', compact('pokemon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pokemon $pokemon)
    {
        $data = $request->except(['_token', '_method']);
        $data['is_legendary'] = $request->has('is_legendary') ? true : false;

        $pokemon->update($data);

        $request->validate([
            'name'=>'required|string|max:255',
            'species'=>'required|string|max:100',
            'primary_type'=>'required|string|max:50',
            'weight'=>'required|numeric|min:0|max:999999',
            'height'=>'required|numeric|min:0|max:999999',
            'hp'=>'required|integer|min:0',
            'attack'=>'required|integer|min:0',
            'defense'=>'required|integer|min:0',
            'is_legendary'=>'boolean',
            'photo'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);
        $pokemon=Pokemon::where('id',$pokemon->id);
        $pokemon->update($request->except(['_token','_method']));
        if($request->hasFile('photo')){
            $file=$request->file('photo');
            $fileName = $file->hashName();
            $filePath = $file->storeAs('public',$fileName);
            $pokemon->update(['photo' => $filePath]);
        }
        return redirect()->route('pokemon.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pokemon $pokemon)
    {
        $pokemon->delete();
        return redirect()->route('pokemon.index');
    }
}
