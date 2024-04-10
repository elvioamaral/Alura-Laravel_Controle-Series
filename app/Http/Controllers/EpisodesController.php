<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EpisodesController
{
    public function index(Season $season)
    {
        return view('episodes.index', ['episodes' => $season->episodes]);
    }

    public function update(Season $season, Request $request)
    {
        DB::transaction(function () use ($season, $request) {

            $watchedEpisodes = $request->episodes;
            $season->episodes->each(function (Episode $episode) use ($watchedEpisodes) {
                $episode->watched = in_array($episode->id, $watchedEpisodes);
            });

            $season->push();
        });



        return to_route('episodes.index', $season->id);
    }
}