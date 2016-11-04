<?php

namespace City\Http\Controllers\admin;

use City\Entities\Provider;
use City\Entities\Service;
use Illuminate\Http\Request;


use City\Http\Controllers\Controller;

class ServicesController extends Controller
{
    function servicesUser($idProvider)
    {

        $provider = Provider::with(['services.pet', 'services.food', 'services.general'])->find($idProvider);
        return view('back.servicesUser', compact('provider'));
    }
    function serviceDetail($idService){

        $service = Service::with('pet','food','general','serviceFiles')->find($idService);
        return view('back.serviceDetail',compact('service'));
    }
}
