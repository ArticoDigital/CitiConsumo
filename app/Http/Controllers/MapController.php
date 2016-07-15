<?php

namespace City\Http\Controllers;

use Illuminate\Http\Request;

use City\Http\Requests;

class MapController extends Controller
{
    public function index($service){
        return view('front.platform');
    }
}
