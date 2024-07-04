<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MondayController
{
    public function index(Request $request): Response {
        if (!$request->has("startDate")) return response("No `startDate` provided in query", 400);
        if (!$request->has("endDate")) return response("No `endDate` provided in query", 400);

        $startDate = date_create($request->input("startDate"));
        $endDate = date_create($request->input("endDate"));

        if ($startDate >= $endDate) {
            return response("Start date must be earlier than end date", 400);
        }

        $mondays = [];
        $nextMonday = $startDate->modify("next monday");
        while (true) {
            $sunday = clone $nextMonday;
            if ($sunday->modify("+6 days") >= $endDate) {
                break;
            }
            $w = $nextMonday->format("W");
            $mondays[$w] = $nextMonday->format("d-m-Y");
            $nextMonday->modify("next monday");
        }

        return response($mondays);
    }
}
