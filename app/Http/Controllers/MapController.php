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
            return redirect()->back()->withInput()->with(['alertTitle' => 'Búsqueda', 'alertText' => $validate->errors()->first()]);

        $dataMap = [
            'lng' => $request->get('lng'),
            'lat' => $request->get('lat')
        ];

        return view('front.platform', compact('dataMap'));
    }

    private function validator($inputs, $service){

        if($service == 'mascotas'){
            $rules = [
                'lat' => 'required',
                'lng' => 'required',
                'date' => 'required',
                'breed' => 'required',
                'size' => 'required'
            ];
        }
        else if($service == 'comidas'){
            $rules = [
                'lat' => 'required',
                'lng' => 'required',
                'date' => 'required',
                'food_type' => 'required'
            ];
        }
        else {
            $rules = [
                'lat' => 'required',
                'lng' => 'required',
                'date' => 'required',
                'service' => 'required'
            ];
        }

        $messages = [
            'lat.required' => 'El campo Dirección es necesario para la busqueda',
            'lng.required' => 'El campo Dirección es necesario para la busqueda',
            'date.required' => 'El campo Fecha es necesario para la busqueda',
            'service.required' => 'El campo Servicio es necesario para la busqueda',
            'breed.required' => 'El campo Raza es necesario para la busqueda',
            'food_type.required' => 'El campo Tipo de comida es necesario para la busqueda',
            'size.required' => 'El campo Tamaño es necesario para la busqueda',
        ];

        return Validator::make($inputs, $rules, $messages);
    }
}
