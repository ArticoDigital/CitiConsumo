<?php

namespace City\Http\Controllers\admin;

use City\Entities\Buy;
use City\Entities\FoodType;
use City\Entities\GeneralType;
use City\Entities\ServiceFile;
use City\Entities\PetSize;
use Illuminate\Support\Facades\Storage;
use DebugBar\DataCollector\MessagesCollector;
use Illuminate\Http\Request;
use City\Http\Requests;
use City\Http\Controllers\Controller;
use City\Entities\Service;
use Illuminate\Support\Facades\Auth;
use Validator;

use City\User;
use City\Entities\Food;
use City\Entities\General;
use City\Entities\Pet;
use City\Entities\Provider;
use City\Entities\ProviderFiles;
use Gate;

//use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function addService()
    {
        $user = auth()->user();
        $foodTypes = FoodType::all();
        $sizes = PetSize::all();
        $generalTypes = GeneralType::all();

        if(isset($user->provider) && $user->provider->isActive)
            return view('back.addService', compact('foodTypes', 'sizes', 'generalTypes'));
        return redirect()->route('uploadFiles');
    }

    public function newService(Request $request)
    {
        $user = Auth::user();
        $inputs = $request->all();

        $validate = $this->validator($inputs);
        if ($validate->fails())
            return redirect()->back()->withInput()->with(['alertTitle' => '¡Hubo un error!', 'alertText' => $validate->errors()->first()]);

        $inputs['provider_id'] = $user->provider->id;
        $service = Service::create($inputs);

        if($inputs['service'] == 1){
            Food::create([
                'food_time' => date_create($inputs['date']),
                'service_id' => $service->id,
                'food_type_id' => $inputs['food_type']
            ]);
        }
        elseif($inputs['service'] == 2) {
            $date = explode('-', $inputs['date']);
            Pet::create([
                'date_start' => date_create($date[0]),
                'date_end' => date_create($date[1]),
                'service_id' => $service->id,
                'pet_sizes' => $inputs['size']
            ]);
        }
        elseif($inputs['service'] == 3) {
            General::create([
                'date' => date_create($inputs['date']),
                'service_id' => $service->id,
                'general_type_id' => $inputs['general_type']
            ]);
        }

        foreach ($inputs as $key => $file){
            if(strpos($key, 'file') !== false){
                $fileName = explode('/temp/', $file)[1];
                rename(base_path('public' . $file), base_path('public/uploads/products/' . $fileName));
                ServiceFile::create([
                    'name' => $fileName,
                    'service_id' => $service->id
                ]);
            }
        }

        return redirect()->route('addService')->with(['alertTitle' => '¡Producto creado!', 'alertText' => 'El producto se ha creado satisfactoriamente']);
    }

    public function uploadTempFiles(Request $request){
        if($request->ajax()) {
            $tempFiles = [];
            foreach ($request->file() as $file) {
                $fileName = str_random(10) . '-&&-' . $file->getClientOriginalName();
                $file->move(base_path() . '/public/temp/', $fileName);
                array_push($tempFiles, '/temp/' . $fileName);
            }

            return ['temp' => $tempFiles];
        }
    }
    
    private function validator($inputs)
    {
        $rules = [
            'service' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'name' => 'required',
            'description' => 'required',
            'date' => 'required',
            'price' => 'required|numeric',
        ];

        if ($inputs['service'] == 2)
            $rules['pets-quantity'] = 'required|numeric';

        return Validator::make($inputs, $rules);
    }

    /*

        public function uploadFiles(){
            return view('back.uploadFiles');
        }

        */
    public function myProfile()
    {
        $userprofile = auth()->user();
        $services = '';
        $buysNotPayed['value'] = 0;
        $buysNotPayed['buys'] = '';

        if (isset($userprofile->provider)){
            $services = Service::where('provider_id', $provider = auth()->user()->provider->id)
                        ->with(['buys' => function ($buys) {
                            $buys->where('state_id', 1)->get();
                        }])->get()->toArray();
            foreach ($services as $service){
                if(count($service['buys'])){
                    foreach($service['buys'] as $buy){
                        if(isset($buy['value']))
                            $buysNotPayed['value'] += $buy['value'] * $buy['products_quantity'];
                            $buysNotPayed['buys'] .= $buy['id'] . ',';
                    }
                }
            }
            $services = Service::whereRaw("provider_id = {$provider} and isValidate <> 2")->get();
        }
        return view('back.profile', compact('userprofile', 'services', 'buysNotPayed'));
    }

    public function uploadFiles()
    {

        $id = auth()->user()->id;
        if ($this->isProvider($id)) {
            $provider_id = Provider::where('user_id', $id)->first();
            //$client = $user->client;
            $providerfiles = ProviderFiles::where('provider_id', $provider_id->id)->get();
            return view('back.uploadFiles', compact('providerfiles'));
        } else {
            return view('back.uploadFiles');

        }
    }

    public function profile($id)
    {
        $userprofile = User::find($id);
        return view('back.profile', compact('userprofile'));
    }


    function updateUser(Request $request)
    {
        $validator = $this->validatorUser($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $this->updateUserSave($request);

        return redirect()->back()->with('success', true);
    }

    private function updateUserSave($request)
    {
        $data = $request->all();

        $user = User::find($data['user_id']);
        //$client = $user->client;

        $user->name = $data['name'];
        $user['last_name'] = $data['last_name'];
        $user->birthday = $data['birthday'];
        $user->address = $data['address'];
        $user->cellphone = $data['cellphone'];
        $user->phone = $data['phone'];
        $user->location = $data['place'];
        $user->user_identification = $data['user_identification'];
        

        $user->bank_account_number=$data['bank_account_number'];
        $user->bank_type_account=$data['bank_type_account'];
        $user->bank_name=$data['bank_name'];

        if(empty($data->password)){
            $user->password = bcrypt($data['password']);

        }

        if ($request->hasFile('profile_image')) {
            $imageName = str_random(10) . '-&&-' . $request->file('profile_image')->getClientOriginalName();
            $request->file('profile_image')->move(base_path() . '/public/uploads/profiles/', $imageName);

            $user['profile_image'] = $imageName;

        }
        $user->email = $data['email'];

        $user->save();

    }
/*
 protected function validator(array $data)
    {

        return Validator::make($data,
            [
                'name' => 'required',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6',
            ],
            [
                'name.required' => 'El nombre es requerido',
                'email.required' => 'El email es obligatorio ',
                'email.email' => 'El email no es valido ',
                'email.unique' => 'Este usuario ya esta registrado',
                'password.required' => 'La contraseña es obligatoria',
            ]);
    }
*/

    protected function validatorUser(array $data)
    {

        $v = Validator::make($data, [
                'name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'email' => 'unique:users,email,' . $data['user_id'],
                'address' => 'required|max:255',
                'birthday' => 'date',
                'cellphone' => 'required|max:255',
                'user_identification' => 'required|max:255',
            ]
        );
        $v->sometimes('profile_image', 'mimes:jpeg,jpg,png,gif|max:20000', function ($data) {
            return !empty($data['profile_image']);
        });
        $v->sometimes('password', 'min:6|required|confirmed', function($data) {
            return !empty($data->password);
        });


        return $v;

    }


    public function uploadFile(Request $request)
    {       
        $validator = $this->validatorFile($request->all());
        
        if ($validator->fails()) {
             $return = ['name' => "Archivo no permitido", 'url' => url('/uploads/provider/'), 'identifier' => $request->identifier, 'success' => false];
            
            /*$this->throwValidationException(
                $request, $validator
            );*/
        }else{
        $fileName = str_random(10) . '-&&-' . $request->file('file')->getClientOriginalName();
        $request->file('file')->move(base_path() . '/public/uploads/provider/', $fileName);
        $return = ['name' => $fileName, 'url' => url('/uploads/provider/' . $fileName), 'identifier' => $request->identifier, 'success' => true];
        }
        return response()->json($return);
    
    }

    protected function validatorFile(array $data)
    {
     //   dd($data);
        $v = Validator::make($data, [
                'file' => 'mimes:jpeg,jpg,png,pdf|max:20000',
            ]
        );

        return $v;

    }

    function uploadProviderFiles(Request $request)
    {
        $validator = $this->validatorFiles($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $this->updloadProviderFilesSave($request);

        return redirect()->back()->with('success', true);
    }


    function uploadUserFileFields(Request $request)
    {
        $inputs = $request->all();
        $validator = $this->validatorFiles($inputs);

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $user_id = $inputs['user_id'];
        $user = User::find($user_id);
        $user->save();

        if ($this->isProvider($user_id)) {
            $this->updateFilesFields($request, $user_id);
        } else {
            $provider_id = $this->createProvider($user_id);
            $this->createFilesFields($request, $provider_id);
            //En este punto se debe notificar al administrador para la aprobacion del proveedor
        }

        return redirect()->back()->with('success', true);
    }

    public function isProvider($user_id)
    {
        if (Provider::where('user_id', $user_id)->first())
            return true;
        return false;
    }

    private function createProvider($user_id)
    {
        $provider = new Provider([
            'isActive' => false,
            'user_id' => $user_id,
        ]);
        $provider->save();

        return $provider->id;
    }

    private function createFilesFields($request, $provider_id)
    {
        $data = $request->all();

        //$provider = Provider::where('user_id', $user_id)->first();
        //$client = $user->client;
        //$provider_files = ProviderFiles::where('provider_id',$provider_id);

        $file = new ProviderFiles([
            'name' => $data['RutFileName'],
            'provider_id' => $provider_id,
            'file_type_id' => 3,
        ]);
        $file->save();

        $file = new ProviderFiles([
            'name' => $data['CCFileName'],
            'provider_id' => $provider_id,
            'file_type_id' => 1,
        ]);
        $file->save();

        $file = new ProviderFiles([
            'name' => $data['BankFileName'],
            'provider_id' => $provider_id,
            'file_type_id' => 5,
        ]);
        $file->save();

        $file = new ProviderFiles([
            'name' => $data['ServicesFileName'],
            'provider_id' => $provider_id,
            'file_type_id' => 4,
        ]);
        $file->save();

        $file = new ProviderFiles([
            'name' => $data['HistoryFileName'],
            'provider_id' => $provider_id,
            'file_type_id' => 2,
        ]);
        $file->save();

        $file = new ProviderFiles([
            'name' => $data['ContraloriaFileName'],
            'provider_id' => $provider_id,
            'file_type_id' => 6,
        ]);
        $file->save();

        $file = new ProviderFiles([
            'name' => $data['PoliciaFileName'],
            'provider_id' => $provider_id,
            'file_type_id' => 7,
        ]);
        $file->save();

        $user = Auth::user();
        $user1 = User::find($user->id);
        $user1->role_id = 2;
        $user1->save();
    }

    private function updateFilesFields($request, $user_id)
    {
        $data = $request->all();

        $provider = Provider::where('user_id', $user_id)->first();
        $provider_id = $provider->id;
        //$client = $user->client;

        $file1 = ProviderFiles::where('provider_id', $provider_id)->where('file_type_id', '3')->first();
        $file1->name = $data['RutFileName'];
        $file1->provider_id = $provider_id;
        $file1->file_type_id = 3;
        $file1->save();

        $match1 = ['provider_id' => $provider_id, 'file_type_id' => 1];
        $file1 = ProviderFiles::where($match1)->first();
        $file1->name = $data['CCFileName'];
        $file1->provider_id = $provider_id;
        $file1->file_type_id = 1;
        $file1->save();

        $match1 = ['provider_id' => $provider_id, 'file_type_id' => 5];
        $file1 = ProviderFiles::where($match1)->first();
        $file1->name = $data['BankFileName'];
        $file1->provider_id = $provider_id;
        $file1->file_type_id = 5;
        $file1->save();

        $match1 = ['provider_id' => $provider_id, 'file_type_id' => 4];
        $file1 = ProviderFiles::where($match1)->first();
        $file1->name = $data['ServicesFileName'];
        $file1->provider_id = $provider_id;
        $file1->file_type_id = 4;
        $file1->save();

        $match1 = ['provider_id' => $provider_id, 'file_type_id' => 2];
        $file1 = ProviderFiles::where($match1)->first();
        $file1->name = $data['HistoryFileName'];
        $file1->provider_id = $provider_id;
        $file1->file_type_id = 2;
        $file1->save();

        $match1 = ['provider_id' => $provider_id, 'file_type_id' => 6];
        $file1 = ProviderFiles::where($match1)->first();
        $file1->name = $data['ContraloriaFileName'];
        $file1->provider_id = $provider_id;
        $file1->file_type_id = 6;
        $file1->save();

        $match1 = ['provider_id' => $provider_id, 'file_type_id' => 7];
        $file1 = ProviderFiles::where($match1)->first();
        $file1->name = $data['PoliciaFileName'];
        $file1->provider_id = $provider_id;
        $file1->file_type_id = 7;
        $file1->save();

        //$user = Auth::user();
        $user1 = User::find($user_id);
        $user1->role_id = 2;
        $user1->save();

        /*$user = Auth::user();
        $user->role_id = 2;
        //dd($user);
        $user->save();
*/
    }


    protected function validatorFiles($data)
    {
        return Validator::make($data, [
            'RutFileName' => 'required|max:255',
            'CCFileName' => 'required|max:255',
            'BankFileName' => 'required|max:255',
            'ServicesFileName' => 'required|max:255',
            'HistoryFileName' => 'required|max:255',
            'ContraloriaFileName' => 'required|max:255',
            'PoliciaFileName' => 'required|max:255',

        ]);
    }


    public function updateStateService(Request $request)
    {
        $service = Service::find($request->input('idService'));
        $service->isActive = $request->input('valor');
        $return = "";
        if($service->save()){
            $return = ['success' => false];
        }
        else{
            $return = ['success' => false];
        
        }
        return response()->json($return);

    }
}
