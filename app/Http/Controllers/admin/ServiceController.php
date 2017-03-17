<?php

namespace City\Http\Controllers\admin;

use City\Entities\FoodType;
use City\Entities\GeneralType;
use City\Entities\PetSize;
use City\Entities\Size;
use City\Entities\ServiceType;
//use City\Entities\RateType;
use City\Entities\ExperienceType;
use City\Entities\KindService;
use City\Entities\ResponseType;
use City\Entities\Service;
use City\Entities\ServiceFile;
use City\Entities\General;
use City\Entities\Food;
use City\Entities\Pet;
use City\Entities\Provider;
use Illuminate\Http\Request;
use City\Http\Requests\RoleRequest;
use City\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Validator;

class ServiceController extends Controller
{
    var $ispressed = false;

    public function servicesUser($id)
    {
        $provider = Provider::with(['services.pet', 'services.food', 'services.general'])->find($id);
        return view('back.servicesUser', compact('provider'));
    }

    public function serviceDetail($id)
    {
        $service = Service::with('pet', 'food', 'general', 'serviceFiles')->find($id);
        return view('back.serviceDetail', compact('service'));
    }

    public function add(RoleRequest $request)
    {
        
        $hours = [];
        $suf = 'am';
        for ($i = 0; $i < 24; $i++) {
            $hour = $i;
            if ($hour > 12) {
                $hour = $hour - 12;
                $suf = 'pm';
            }
            $hour = ($hour < 10) ? '0' . $hour : $hour;
            $suf = ($hour == 12) ? $suf = 'm' : $suf;
            $hours[] = $hour . ':00' . $suf;
        }

        if ($request->isNotAuthorized())
            return redirect()->route('myProfile');

        $user = auth()->user();

        //$foodTypes = FoodType::all();
        //$generalTypes = GeneralType::all();
        //$sizes = PetSize::all();
        $kindServices = KindService::all();
        //$petTypes = ServiceType::where('kind_service_id', '1')->get();
        //$generalTypes = ServiceType::where('kind_service_id', '2')->get();
        //$foodTypes = ServiceType::where('kind_service_id', '3')->get();
        $serviceTypes=ServiceType::all();

        //$rateTypes = RateType::all();
        $experienceTypes = ExperienceType::all();
        $responseTypes = ResponseType::all();

        $sizes = Size::all();

        if (isset($user->provider)) {
            if ($user->provider->isActive == 1) {
                //return view('back.addService', compact('kindServices','foodTypes', 'sizes', 'generalTypes', 'petTypes', 'experienceTypes', 'responseTypes', 'hours'));
                return view('back.addService', compact('kindServices', 'sizes', 'serviceTypes','experienceTypes', 'responseTypes', 'hours'));

            } else if ($user->provider->isActive == 2) {
                return redirect()->to('admin')->with(['alertTitle' => '¡No puedes realizar esta acción!', 'alertText' => 'El administrador te ha eliminado como proveedor, debes enviar un mensaje al administrador para reactivarte']);
            } else {
                return redirect()->to('admin')->with(['alertTitle' => '¡Solicitud de registro exitosa!', 'alertText' => 'Hemos recibido tu solicitud de registro con éxito. Pronto podrás vender tus servicios.']);
            }
        }
        return redirect()->route('uploadFiles')->with(['alertTitle' => '¡Ofrece tus servicios!', 'alertText' => 'Para que puedas ofrecer tus servicios, debes cargar los siguientes documentos, así ofreceremos mayor confianza a la comunidad Cityconsumo! una vez aprobados, recibirás un correo de confirmación y podrás empezar a trabajar con nosotros como proveedor!']);
    }

    public function create(RoleRequest $request)
    { 
       

                
        if ($request->isNotAuthorized())
            return redirect()->route('myProfile');
        if (!$this->ispressed) {
            $this->ispressed = true;
            $user = auth()->user();
            $inputs = $this->setFiles($request->all());

            $validate = $this->validator($inputs);
            if ($validate->fails()) {
                $validate->errors()->first();
                $this->ispressed = false;
                return redirect()->back()->withInput()->withErrors($validate)->with(['Files' => $inputs['Files'], 'alertTitle' => '¡Hubo un error!', 'alertText' => $validate->errors()->first()]);
            }
            

            $inputs['provider_id'] = $user->provider->id;
            $inputs['location'] = $inputs['address'];
            $inputs['price'] = str_replace(['$', '.', ','], '', $inputs['price']);
            //print_r($inputs['days']);
            $inputs['date_start']  = date_format(date_create_from_format('d/m/Y', $inputs['date_start']), 'Y/m/d');
            $inputs['date_end']  = date_format(date_create_from_format('d/m/Y', $inputs['date_end']), 'Y/m/d');
           // $inputs['date_start'] = date_create($inputs['date_start']);
            //$inputs['date_end'] = date_create($inputs['date_end']);
            
            $days_comma_separated = implode(",", $inputs['days']);
            if(isset($inputs['service_addition'])) {
                $inputs['service_addition'] = implode(",", $inputs['service_addition']);
            }
            //print_r($comma_separated);
            $inputs['days']=$days_comma_separated;
            $service = Service::create($inputs);
            
            $array_sizes=[];
            if (isset($inputs['size1']))$array_sizes[]=$inputs['size1'];
            if (isset($inputs['size2']))$array_sizes[]=$inputs['size2'];
            if (isset($inputs['size3']))$array_sizes[]=$inputs['size3'];
            if (isset($inputs['size4']))$array_sizes[]=$inputs['size4'];
            
            if ($request->file('certificate1')) {
                    $imageName = str_random(10) . '-&&-' . $request->file('certificate1')->getClientOriginalName();
                    $request->file('certificate1')->move(base_path() . '/public/uploads/products/', $imageName);
                    //$inputs['certificate1'] = $imageName;


                    ServiceFile::create([
                    'name' => $imageName,
                    'service_id' => $service->id,
                    'kind_file' => "certificado" //certificado
                ]);
                }
            if ($request->file('certificate2')) {
                    $imageName = str_random(10) . '-&&-' . $request->file('certificate2')->getClientOriginalName();
                    $request->file('certificate2')->move(base_path() . '/public/uploads/products/', $imageName);
                    //$inputs['certificate2'] = $imageName;


                    ServiceFile::create([
                    'name' => $imageName,
                    'service_id' => $service->id,
                    'kind_file' => "certificado" //certificado
                ]);
                }
            if ($request->file('certificate3')) {
                    $imageName = str_random(10) . '-&&-' . $request->file('certificate3')->getClientOriginalName();
                    $request->file('certificate3')->move(base_path() . '/public/uploads/products/', $imageName);
                    //$inputs['certificate3'] = $imageName;


                    ServiceFile::create([
                    'name' => $imageName,
                    'service_id' => $service->id,
                    'kind_file' => "certificado" //certificado
                ]);
                }


           

            if ($inputs['service'] == 3) {
                Food::create([
                    'food_time' => date_create($inputs['date']),
                    'service_id' => $service->id,
                    'food_type_id' => $inputs['food_type'],
                    'foods-quantity' => $inputs['foods-quantity'],
                ]);
            } elseif ($inputs['service'] == 1) {
                //$date = explode('-', $inputs['date']);
                $pet = Pet::create([
                  //  'date_start' => date_create($date[0]),
                  //  'date_end' => date_create($date[1]),
                    'service_id' => $service->id,
                    //'pet_sizes' => $inputs['size'],
                    //'pets_quantity' => $inputs['pets-quantity'],
                    'puppy' => isset($inputs['puppy'])?$inputs['puppy']:0,
                    'adult' => isset($inputs['adult'])?$inputs['adult']:0,
                    'smoke_free' => isset($inputs['smoke_free'])?$inputs['smoke_free']:0,
                    'elderly' => isset($inputs['elderly'])?$inputs['elderly']:0,
                    'home_service' => isset($inputs['home_service'])?$inputs['home_service']:0,
                ]);
                $pet->sizes()->attach($array_sizes);

            } elseif ($inputs['service'] == 2) {
                General::create([
                    'date' => date_create($inputs['date']),
                    'service_id' => $service->id,
                    'general_type_id' => $inputs['general_type']
                ]);
            }

            $this->moveFiles($inputs, $service);

            return redirect()->route('addService')->with(['alertTitle' => '¡Servicio creado con éxito!', 'alertText' => 'Cuando se apruebe recibirás un correo de confirmación']);
            $this->ispressed = false;
        }
    }

    public function delete(RoleRequest $request)
    {

        if ($request->isNotAuthorized())
            return redirect()->route('myProfile');

        $service = Service::find($request->id);
        $service->update(['isValidate' => 2]);

        /********** Notificar que el producto fue rechazado por mail **********/

        if ($request->ajax())
            return ['message' => 'El servicio ha sido eliminado'];
    }

    public function deleteServiceByProvider(RoleRequest $request)
    {

        if ($request->isNotAuthorized())
            return redirect()->route('myProfile');

        $service = Service::find($request->id);
        $service->update(['isValidate' => 2]);

        if ($request->ajax())
            return ['message' => 'El servicio ha sido eliminado'];
    }

    public function edit(RoleRequest $request, $id)
    {

        if ($request->isNotAuthorized())
            return redirect()->route('myProfile');

        $service = Service::with(['food', 'pet', 'general', 'serviceFiles'])->where('id', $id)->firstOrFail()->toArray();
        $foodTypes = FoodType::all();
        $sizes = PetSize::all();
        $generalTypes = GeneralType::all();
        if ($service)
            return view('back.editService', compact('service', 'foodTypes', 'sizes', 'generalTypes'));
        return redirect()->back();
    }

    public function update(RoleRequest $request, $id)
    {

        if ($request->isNotAuthorized())
            return redirect()->route('myProfile');

        $user = auth()->user();
        $inputs = $this->setFiles($request->all());
        $validate = $this->validator($inputs);

        if ($validate->fails())
            return redirect()->back()->withInput()->withErrors($validate)->with(['Files' => $inputs['Files'], 'alertTitle' => '¡Hubo un error!', 'alertText' => $validate->errors()->first()]);

        $inputs['provider_id'] = $user->provider->id;
        $inputs['location'] = $inputs['address'];
        $inputs['price'] = str_replace(['$', '.', ','], '', $inputs['price']);

        $service = Service::find($id);
        $service->update([
            'name' => $inputs['name'],
            'description' => $inputs['description'],
            'price' => $inputs['price'],
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
        $this->moveFiles($inputs, $service);

        return redirect()->route('myProfile')->with(['alertTitle' => '¡Servicio actualizado!', 'alertText' => 'El servicio ha sido actualizado con éxito.']);
    }

    /************** Validar formularios ***************/

    private function validator($inputs)
    {
        $rules = [
            'terms_conditions' => 'required',
            'service' => 'required',
            'service_type_id' => 'required',
            'rate_type' => 'required',
            'price' => 'required|numeric',
            'description' => 'required|max:800',
            'date_start' => 'required',
            'date_end' => 'required',
            'days'=> 'required', 
            'lat' => 'required',
            'lng' => 'required',
            'address' => 'required',
            //'name' => 'required',
            
            
            
            'countFiles' => 'in:3,4,5',
        ];

        if ($inputs['service'] == 3)
            $rules['foods-quantity'] = 'required|numeric';
        if ($inputs['service'] == 2)
            $rules['pets-quantity'] = 'required|numeric';
        /*if ($inputs['service'] == 1)
            $rules['pets-quantity'] = 'required|numeric';
*/
        return Validator::make($inputs, $rules);
    }

    /************** Contar archivos subidos ***************/

    private function setFiles($inputs)
    {
        $inputs['Files'] = [];
        $inputs['countFiles'] = 0;

        foreach ($inputs as $key => $input) {
            if (strpos($key, 'file') !== false) {
                $inputs['countFiles']++;
                array_push($inputs['Files'], $inputs[$key]);
            }
        }
        //dd($inputs);
        return $inputs;
    }

    /************** Mover archivos ***************/

    private function moveFiles($inputs, $service)
    {
        foreach ($inputs as $key => $file) {
            if (strpos($key, 'file') !== false) {
                $explode = explode('/temp/', $file);
                $fileName = isset($explode[1]) ? $explode[1] : $file;
                if (isset($explode[1]))
                    rename(base_path('public' . $file), base_path('public/uploads/products/' . $fileName));

                ServiceFile::create([
                    'name' => $fileName,
                    'service_id' => $service->id,
                    'kind_file' => "imagen" //certificado
                ]);
            }
        }
    }
}
