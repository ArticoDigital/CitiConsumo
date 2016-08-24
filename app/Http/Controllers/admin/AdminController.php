<?php

namespace City\Http\Controllers\admin;

use Illuminate\Http\Request;
use City\Http\Requests;
use City\Http\Controllers\Controller;
use City\Entities\Service;
use Validator;

class AdminController extends Controller
{
    public function addService(){
        return view('back.addService');
    }

    public function newService(Request $request){
        $inputs = $request->all();
        $validate = $this->validator($inputs);
        if($validate->fails())
            return redirect()->back()->withInput()->with(['alertTitle' => '¡Hubo un error!', 'alertText' => $validate->errors()->first()]);
        dd(auth()->user());
        $inputs['provider_id'] = auth()->user()->provider();
        dd($inputs);
        $service = Service::create($inputs);

        //if($inputs['service'] == 1)
        return redirect()->route('addService');
    }

    public function uploadFiles(){
        return view('back.uploadFiles');
    }

    public function profile(){
        return view('back.profile');
    }

    private function validator($inputs){
        $rules = [
            'service' => 'required',
            'location' => 'required',
            'name' => 'required',
            'description' => 'required',
            'date' => 'required',
            'price' => 'required|numeric',
        ];

        if($inputs['service'] == 2)
            $rules['pets-quantity'] = 'required|numeric';

        $messages = [
            'service.required' => '<p>Debe seleccionar el <b>tipo de servicio<b>.</p>',
            'location.required' => '<p>Seleccione la <b>ubicación</b> donde piensa prestar el servicio.</p>',
            'name.required' => '<p>El campo <b>nombre</b> es requerido.</p>',
            'description.required' => '<p>El campo <b>descripción</b> es requerido.</p>',
            'date.required' => '<p>Es necesario que ingrese una <b>fecha</b> o <b>rango de fechas</b> en las que prestará el servicio.</p>',
            'price.required' => '<p>Escriba el <b>precio</b> del servicio.</p>',
            'pets-quantity.required' => '<p>Escriba el <b>número de mascotas</b> que puede cuidar.</p>',
            'price.numeric' => '<p>En el campo <b>"precio"</b>, solo se aceptan números.</p>',
            'pets-quantity.numeric' => '<p>En el campo <b>"numero de mascotas"</b>, solo se aceptan números.</p>'
        ];

        return Validator::make($inputs, $rules, $messages);
    }
}
