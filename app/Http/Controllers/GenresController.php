<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenresRequest;
use App\Models\Genres;
use Illuminate\Http\Request;

class GenresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genres::all();

        return response()->json([
            'message' => 'Todos os generos',
            'genres' => $genres 
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GenresRequest $request)
    {
        $genre = Genres::create([
            'title' => $request->validated(['title'])
        ]);

        if ($genre) {
            return response()->json([
                'message' => 'Genero criado com successo',
                'genre' => $genre
            ],201);
        } else {
            return response()->json([
                'message' => 'Falha ao criar genero',
            ],404);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Genres $id)
    {
        $genre = Genres::findOrFail($id);

        return response()->json([
            'message' => 'Genero encontrado',
            'genre' => $genre
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GenresRequest $request, Genres $genre)
    {
        $update = $genre->update([
            'title' => $request->validated(['title'])
        ]);

        if ($update) {
            return response()->json([
                'message' => 'Genero atualizado com successo',
                'genre' => $genre
            ],200);
        } else {
            return response()->json([
                'message' => 'Falha ao atualizar genero',
            ],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genres $genre)
    {
        $deleted = $genre->delete();

        return response()->json([
            'message' => 'genero deletado com successo',
        ],204);
    }
}
