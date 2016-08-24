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
            'price' => 'required|number',
        ];

        if($inputs['service'] == 2)
            $rules['pets-quantity'] = 'required';

        Validator::make($inputs, $rules);
    }
}
