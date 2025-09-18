<?php

namespace App\Http\Controllers;

use App\Http\Requests\MoviesRequest;
use App\Models\Movies;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movies::all();

        return response()->json([
            'message' => 'Todos os filmes',
            'movies' => $movies
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MoviesRequest $request)
    {
        $movie = Movies::create([
            'title' => $request->validated(['title']),
            'synopis' => $request->validated(['synopis']),
            'duration' => $request->validated(['duration']),
            'releaseDate' => $request->validated(['releaseDate']),
        ]);

        if ($movie) {
            return response()->json([
                'message' => 'Filme criado com sucesso',
                'movie' => $movie
            ], 201);
        } else {
            return response()->json([
                'message' => 'Erro ao criar filme'
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Movies $id)
    {
        $movie = Movies::findOrFail($id);

        return response()->json([
            'message' => 'FIlme encontrado com successo',
            'movie' => $movie
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MoviesRequest $request, Movies $movie)
    {
        $update = $movie->update([
            'title' => $request->validated(['title']),
            'synopis' => $request->validated(['synopis']),
            'duration' => $request->validated(['duration']),
            'releaseDate' => $request->validated(['releaseDate']),
        ]);

        if ($update) {
            return response()->json([
                'message' => 'Filme atualizado com sucesso',
                'movie' => $movie
            ], 201);
        } else {
            return response()->json([
                'message' => 'Erro ao atualizar filme'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movies $movie)
    {
        $delete = $movie->delete();

        return response()->json([
            'message' => 'filme deletado com sucesso'
        ],200);

    }
}
