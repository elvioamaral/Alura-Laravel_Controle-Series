<?php

namespace App\Http\Controllers;

use App\Models\Series;

class SeasonsController extends Controller
{
    public function index(Series $series)
    {
        $seasons = $series->seasons()->with('episodes')->get();

        return view('seasons.index')->with('seasons', $seasons)->with('series', $series);

    }
}

/*
Passo a passo
1
Começando com Laravel
Neste primeiro passo, você vai aprender a utilizar Laravel. Vamos abordar desde MVC, formulários até a criação de relacionamentos.


Concluído
VIDEO
Ecossistema PHP com Vinicius Dias | #HipstersPontoTube - YouTube

Concluído
CURSO
Laravel: criando uma aplicação com MVC

Concluído
CURSO
Laravel: validando formulários, usando sessões e definindo relacionamentos

Formação Laravel da Alura: crie aplicações web em PHP. Cursos já finalizados até a criação desse repo: Laravel - criando uma aplicação com MVC; Laravel - validando formulários, usando sessões e definindo relacionamentos.
 */