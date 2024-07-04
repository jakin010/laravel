<?php

namespace App\Http\Controllers;

use App\Http\Resources\GetBewonerResource;
use App\Models\Beschikking;
use App\Models\Bewoner;
use App\Models\Rit;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CallCenterController
{
    function getBewoners(Request $request): Response
    {
        $page = max((int)$request->get('page'), 1);

        $bewoner = Bewoner::query()
            ->with('parceel')
            ->forPage($page, 10)
            ->get();

        return response(GetBewonerResource::collection($bewoner));
    }

    function createRit(Request $request): Response
    {
        $post = $request->post();
        if (!isset($post['id']) || !isset($post['km'])) {
            return response(status: 400);
        }

        $bewonerID = (int)$post['id'];
        $kilometer = (int)$post['km'];

        if ($kilometer <= 0) {
            return response(status: 400);
        }

        $now = date_create()->modify('+1 day')->format('Y-m-d H:i:s');

        $bewoner = Bewoner::query()
            ->whereNotNull('beschikking_id')
            ->whereRelation('beschikking', 'start_date', '<=', $now)->whereRelation('beschikking', 'end_date', '>=', $now)
            ->with(['beschikking', 'ritten'])->find($bewonerID);

        if (!isset($bewoner) && !isset($bewoner->beschikking)) {
            return response(status: 400);
        }

        $filteredRitten = $bewoner->ritten->filter(function ($rit) use ($bewoner) {
            return $rit->date_of_rit >= $bewoner->beschikking->start_date &&
                $rit->date_of_rit <= $bewoner->beschikking->end_date;
        });

        $totalKilometers = $filteredRitten->sum('kilometer');

        if ($totalKilometers + $kilometer > $bewoner->beschikking->maximaal_kilometer) {
            return response(status: 400);
        }

        $rit = Rit::query()->create([
            'bewoner_id' => $bewonerID,
            'kilometer' => $kilometer,
            'date_of_rit' => $now,
        ])->save();

        return response(status: 200);
    }
}
