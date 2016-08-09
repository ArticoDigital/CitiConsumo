<?php

namespace City\Http\Controllers;

use City\Entities\FoodType;
use Illuminate\Http\Request;
use City\Entities\PetBreed;
use City\Entities\GeneralType;
use City\Http\Requests;
use Illuminate\Support\Facades\Redirect;

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
        $services = GeneralType::all();
        return view('front.generalServices', ['services' => $services]);
    }

    public function foodsIndex(){
        $foods = FoodType::all();
        return view('front.foods', ['foods' => $foods]);
    }

    public function addService(){
        return view('front.addService');
    }

    public function newService(Request $request){
        dd($request->all());
        return Redirect::route('addService');
    }

    public function uploadFiles(){
        return view('front.uploadFiles');
    }

    public function profile(){
        return view('front.profile');
    }
}
