<?php

namespace City\Http\Controllers\admin;

use City\Entities\FoodType;
use City\Entities\GeneralType;
use City\Entities\PetSize;
use City\Entities\Service;
use City\Entities\ServiceFile;
use Illuminate\Http\Request;
use City\Http\Requests\RoleRequest;
use City\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Validator;

class ServiceController extends Controller
{
    public function deleteService(RoleRequest $request)
    {

        if ($request->isNotAuthorized())
            return redirect()->route('myProfile');

        $service = Service::find($request->id);
        $service->update(['isValidate' => 2]);

        /********** Notificar que el producto fue rechazado por mail **********/

        if ($request->ajax())
            return ['message' => 'El servicio ha sido eliminado'];
    }

    public function editService(RoleRequest $request, $id)
    {
        if ($request->isNotAuthorized())
            return redirect()->route('myProfile');

        $service = Service::with(['food', 'pet', 'general', 'serviceFiles'])->where('id', $id)->firstOrFail()->toArray();
        $foodTypes = FoodType::all();
        $sizes = PetSize::all();
        $generalTypes = GeneralType::all();
        if($service)
            return view('back.editService', compact('service', 'foodTypes', 'sizes', 'generalTypes'));
        return redirect()->back();
    }

    public function editServicePost(RoleRequest $request, $id)
    {

        if ($request->isNotAuthorized())
            return redirect()->route('myProfile');

        $inputs = $request->all();

        $validate = $this->validator($inputs);
        if ($validate->fails())
            return redirect()->back()->withInput()->withErrors($validate)->with(['alertTitle' => '¡Hubo un error!', 'alertText' => $validate->errors()->first()]);
        if (!array_key_exists('file3', $inputs))
            return redirect()->back()->withInput()->withErrors($validate)->with(['alertTitle' => '¡Hubo un error!', 'alertText' => 'Debes suber mínimo 3 imágenes']);

        $service = Service::find($id);
        $service->update([
            'name' => $inputs['name'],
            'description' => $inputs['description'],
            'price' => $inputs['price'] = str_replace(['.', ','], '', $inputs['price']),
            'location' => $inputs['address'],
            'lat' => $inputs['lat'],
            'lng' => $inputs['lng'],
        ]);

        if ($inputs['service'] == 1) {
            $service->food->update([
                'food_time' => date_create($inputs['date']),
                'food_type_id' => $inputs['food_type'],
                'foods-quantity' => $inputs['foods-quantity']
            ]);
        } elseif ($inputs['service'] == 2) {
            $date = explode('-', $inputs['date']);
            $service->pet->update([
                'pet_sizes' => $inputs['size'],
                'pets_quantity' => $inputs['pets_quantity'],
                'date_start' => date_create($date[0]),
                'date_end' => date_create($date[1]),
            ]);
        } elseif ($inputs['service'] == 3) {
            $service->general->update([
                'general_type_id' => $inputs['general_type'],
                'date' => date_create($inputs['date'])
            ]);
        }

        $service->serviceFiles()->delete();
        foreach ($inputs as $key => $file) {
            if (strpos($key, 'file') !== false) {
                $explode = explode('/temp/', $file);
                $fileName = isset($explode[1]) ? $explode[1] : $file;
                if (isset($explode[1]))
                    rename(base_path('public' . $file), base_path('public/uploads/products/' . $fileName));

                ServiceFile::create([
                    'name' => $fileName,
                    'service_id' => $service->id
                ]);
            }
        }

        return redirect()->route('myProfile')->with(['alertTitle' => '¡Servicio actualizado!', 'alertText' => 'El servicio ha sido actualizado con éxito.']);
    }

    private function validator($inputs)
    {
        $rules = [
            'service' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'address' => 'required',
            'name' => 'required',
            'description' => 'required|max:800',
            'date' => 'required',
            'price' => 'required|numeric',
        ];

        if ($inputs['service'] == 1)
            $rules['foods-quantity'] = 'required|numeric';
        if ($inputs['service'] == 2)
            $rules['pets_quantity'] = 'required|numeric';

        return Validator::make($inputs, $rules);
    }
}
