<?php

namespace City\Http\Controllers;

use Illuminate\Http\Request;

use City\Http\Requests;
use Validator;

class MapController extends Controller
{
    public function index($service, Request $request)
    {
        $validate = $this->validator($request->all(), $service);
        if($validate->fails())
            return redirect()->back()->withInput()->with(['alertTitle' => 'Búsqueda', 'alertText' => 'Para realizar la busqueda, debe llenar todos los campos. Gracias']);

        $dataMap = [
            'lng' => $request->get('lng'),
            'lat' => $request->get('lat')
        ];

        return view('front.platform', compact('dataMap'));
    }

    private function validator($inputs, $service){

        if($service == 'mascotas'){
            $rules = [
                'place' => 'required',
                'date' => 'required',
                'breed' => 'required',
                'size' => 'required'
            ];
        }
        else if($service == 'comidas'){
            $rules = [
                'place' => 'required',
                'date' => 'required',
                'food_type' => 'required'
            ];
        }
        else {
            $rules = [
                'place' => 'required',
                'date' => 'required',
                'service' => 'required'
            ];
        }

        return Validator::make($inputs, $rules);
    }
}
