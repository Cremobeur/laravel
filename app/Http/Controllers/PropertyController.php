<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{

    // Affiche la liste des annonces
    public function index()
    {
        // Attention use Illuminate\support\Facades\DB
        // $properties = DB::select('select * from properties where sold = :sold', [
        //     'sold' => 0,
        // ]);

        // $properties = DB::table('properties')->get();

        return view('properties/index', [
            'properties' => Property::all(),
            // 'properties' => Property::where('sold', 0)->get()
        ]);
    }

    // Affiche une annonce
    public function show(Property $property)
    {
        // $property = DB::table('properties')->find($id);

        // if (! $property) {
        //     abort(404); // On renvoie une erreur 404
        // }

        return view('properties/show', [
            'property' => $property,
        ]);
    }

    // Formulaire pour créer une annonce
    public function create()
    {
        return view('properties/create');
    }

    // Enregistre l'annonce dans la BDD
    public function store(Request $request)
    {
        // Traitement du formulaire
        $request->validate([
            'title' => 'required|string|unique:properties|min:2',
            'description' => 'required|string|min:5',
            'image' => 'image',
            'price' => 'required|integer|gt:0',
        ]);

        $path = null;
        if ($request->hasfile('image')) {
            $path = $request->image->store(
                'public/annonces',
            );
        }

        // DB::table('properties')->insert([
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'image' => str_replace('public', '/storage', $path),
        //     'price' => $request->price,
        //     'sold' => $request->filled('sold'),
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        Property::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => str_replace('public', '/storage', $path),
            'price' => $request->price,
            'sold' => $request->filled('sold'),
        ]);

        // Autre solution...
        // DB::table('properties')->insert(
        //     $request->all('title', 'description', 'price') +
        //     ['sold' => $request->filled('sold')]
        // );

        // On redirige et on met un message
        return redirect('/nos-annonces')->withInput();
    }

    public function edit($id)
    {
        // $property = DB::table('properties')->find($id);

        // if (! $property) {
        //     abort(404);
        // }

        $property = Property::findOrFail($id);

        return view('properties/edit', ['property' => $property]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|unique:properties,title,'.$id.'|min:2',
            'description' => 'required|string|min:5',
            'price' => 'required|integer|gt:0',
        ]);

        // DB::table('properties')->where('id', $id)->update([
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'price' => $request->price,
        //     'sold' => $request->filled('sold'),
        //     'updated_at' => now(),
        // ]);

        Property::findOrFail($id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'sold' => $request->filled('sold'),
        ]);

        return redirect('/nos-annonces')->with('message', 'Annonce mise à jour');
    }

    public function destroy($id)
    {

        // $property = DB::table('properties')->find($id);
        $property = Property::findOrFail($id);

        if ($property->image) {
            Storage::delete(
                str_replace('/storage', 'public', $property->image)
            );
        }

        $property->delete($id);

        return redirect('/nos-annonces')->with('message', 'Annonce supprimée');
    }

}
