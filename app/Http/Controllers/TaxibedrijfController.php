<?php

namespace App\Http\Controllers;

use App\Models\Taxibedrijf;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaxibedrijfController
{
    function getRitten(Request $request): Response
    {
        $page = max((int)$request->get('page'), 1);
        $taxiID = $request->header('taxi-id');

        if (!isset($taxiID)) {
            return response(status: 400);
        }

        $taxibedrijf = Taxibedrijf::query()->find($taxiID);

        $parcelenVerantwoordelijk = $taxibedrijf->taxibedrijfParceelVerantwoordelijk;

        $ritten = [];

        foreach ($parcelenVerantwoordelijk as $value) {
            $parceel = $value->parceel;
            $bewoners = $parceel->bewoners;
            foreach ($bewoners as $bewoner) {
                $validRitten = $bewoner->ritten->filter(function ($rit) {
                   return $rit->date_of_rit > date('Y-m-d H:i:s');
                });

                if ($validRitten->count() > 0) {
                    $ritten[] = ['bewoner' => $bewoner->name, 'parceel' => $parceel->name, 'ritten' => $validRitten];
                }
            }
        }

        return response($ritten, 200);
    }
}
