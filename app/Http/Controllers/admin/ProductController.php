<?php

namespace City\Http\Controllers\admin;

use City\Entities\Service;
use Illuminate\Http\Request;
use City\Http\Requests;
use City\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ProductController extends Controller
{
    public function delete(Request $request){
        $service = Service::find($request->id);
        $service->update(['isValidate' => 2]);

        /********** Notificar que el producto fue rechazado por mail **********/
        
        if($request->ajax())
            return ['message' => 'El producto ha sido eliminado'];
    }
}
