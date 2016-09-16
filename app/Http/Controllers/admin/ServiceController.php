<?php

namespace City\Http\Controllers\admin;

use City\Entities\FoodType;
use City\Entities\GeneralType;
use City\Entities\PetSize;
use City\Entities\Service;
use City\Entities\ServiceFile;
use Illuminate\Http\Request;
use City\Http\Requests;
use City\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ServiceController extends Controller
{
    public function deleteService(Request $request){
        $service = Service::find($request->id);
        $service->update(['isValidate' => 2]);

        /********** Notificar que el producto fue rechazado por mail **********/
        
        if($request->ajax())
            return ['message' => 'El producto ha sido eliminado'];
    }

    public function editService($id){
        $provider = auth()->user()->provider;
        $service = Service::with(['food', 'pet', 'general', 'serviceFiles'])->whereRaw("id = {$id} and provider_id = {$provider->id}")->firstOrFail()->toArray();
        $foodTypes = FoodType::all();
        $sizes = PetSize::all();
        $generalTypes = GeneralType::all();
        if($service)
            return view('back.editService', compact('service', 'foodTypes', 'sizes', 'generalTypes'));
        return redirect()->back();
    }

    public function editServicePost(Request $request, $id){
        $inputs = $request->all();
        $service = Service::find($id);
        $service->update([
            'name' => $inputs['name'],
            'description' => $inputs['description'],
            'price' => $inputs['price'],
            'location' => $inputs['address'],
            'lat' => $inputs['lat'],
            'lng' => $inputs['lng'],
        ]);

        if($inputs['service'] == 1) {
            $service->food->update([
                'food_time' => date_create($inputs['date']),
                'food_type_id' => $inputs['food_type']
            ]);
        }
        elseif($inputs['service'] == 2) {
            $date = explode('-', $inputs['date']);
            $service->pet->update([
                'pet_sizes' => $inputs['size'],
                'date_start' => date_create($date[0]),
                'date_end' => date_create($date[1]),
            ]);
        }
        elseif($inputs['service'] == 3) {
            $service->general->update([
                'general_type_id' => $inputs['general_type'],
                'date' => date_create($inputs['date'])
            ]);
        }

        $service->serviceFiles()->delete();
        foreach ($inputs as $key => $file){
            if(strpos($key, 'file') !== false){
                $explode = explode('/temp/', $file);
                $fileName = isset($explode[1]) ? $explode[1] : $file;
                if(isset($explode[1]))
                    rename(base_path('public' . $file), base_path('public/uploads/products/' . $fileName));

                ServiceFile::create([
                    'name' => $fileName,
                    'service_id' => $service->id
                ]);
            }
        }

        return redirect()->route('myProfile')->with(['alertTitle' => '¡Producto actualizado!', 'alertText' => 'El producto ha sido actualizado con éxito.']);
    }
}
