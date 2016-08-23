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
        $rules = [
            'place' => 'required',
            'date' => 'required'
        ];

        if($service == 'mascotas'){
            $rules['breed'] = 'required';
            $rules['size'] = 'required';
        }
        else if($service == 'comidas')
            $rules['food_type'] = 'required';
        else
            $rules['service'] = 'required';

        return Validator::make($inputs, $rules);
    }
}
