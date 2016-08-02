<?php

namespace City\Http\Controllers;

use Illuminate\Http\Request;

use City\Http\Requests;

class MapController extends Controller
{
    public function index($service, Request $request)
    {
        $dataMap = [
            'lng' => $request->get('lng'),
            'lat' => $request->get('lat')
        ];

        return view('front.platform', compact('dataMap'));
    }
}
