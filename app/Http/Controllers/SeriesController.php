<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesRequest;
use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::query()->orderby('nome')->get();
        $mensagem_sucesso = session('mensagem.sucesso');
        
        return view('series.index', [
            'series' => $series,
            'mensagem_sucesso' => $mensagem_sucesso
        ]);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesRequest $request)
    {
        $request->validate([
            'nome'=>['required','min:3']
        ]);
        $serie = Serie::create($request->all());
        return to_route('series.index')->with('mensagem.sucesso', "Série {$serie->nome} removida com sucesso.");
    }

    public function destroy(Serie $series)
    {
        $series->delete();
        return to_route('series.index')->with('mensagem.sucesso', "Série {$series->nome} removida com sucesso.");
    }

    public function edit(Serie $series)
    {
        return view('series.edit')->with('serie', $series);
    }

    public function update(Serie $serie,SeriesRequest $request)
    {
        $serie->nome = $request->nome;
        $serie->save();
        return to_route('series.index')->with('mensagem.sucesso', "Série {$serie->nome} Atualizada com sucesso.");
    }
}

