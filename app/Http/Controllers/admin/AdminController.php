<?php

namespace City\Http\Controllers\admin;

use Illuminate\Http\Request;
use City\Http\Requests;
use City\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function addService(){
        return view('back.addService');
    }

    public function newService(Request $request){
        dd($request->all());
        return Redirect::route('addService');
    }

    public function uploadFiles(){
        return view('back.uploadFiles');
    }

    public function profile(){
        return view('back.profile');
    }
}
