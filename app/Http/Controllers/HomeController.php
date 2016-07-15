<?php

namespace City\Http\Controllers;

use Illuminate\Http\Request;
use City\Entities\PetBreed;
use City\Http\Requests;

class HomeController extends Controller
{

    public function homeIndex(){
        return view('front.home');
    }

    public function petsIndex(){
        $breeds = PetBreed::all();
        return view('front.pets', ['breeds' => $breeds]);
    }

    public function servicesIndex(){
        return view('front.generalServices');
    }

    public function footsIndex(){
        return view('front.foods');
    }
}
