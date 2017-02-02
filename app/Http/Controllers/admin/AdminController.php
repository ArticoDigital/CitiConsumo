<?php

namespace City\Http\Controllers\admin;

use Illuminate\Support\Facades\Hash;
use City\Entities\FoodType;
use City\Entities\GeneralType;
use City\Entities\ServiceFile;
use City\Entities\PetSize;
use Illuminate\Http\Request;
use City\Http\Requests;
use City\Http\Requests\RoleRequest;
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

class AdminController extends Controller
{

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

    public function myProfile(RoleRequest $request){

        if($request->isNotAuthorized())
            return redirect()->route('myProfile');

        $services = [];
        $userprofile = auth()->user();
        $buysNotPayed = $this->getBuysNotPayed($userprofile);
        if(isset($userprofile->provider))
            $services = Service::whereRaw("provider_id = {$userprofile->provider->id} and isValidate <> 2")->get();
        return view('back.profile', compact('userprofile', 'services', 'buysNotPayed'));
    }

    private function getBuysNotPayed($user){
        $buysNotPayed = ['value' => 0, 'buys' => ''];

        if(isset($user->provider)){
            $services = Service::where('provider_id', $user->provider->id)
                        ->with(['buys' => function ($buys) {
                            $buys->where('state_id', 1)->get();
                        }])->get();

            foreach ($services as $service){
                foreach($service->buys as $buy) {
                    if(isset($buy['value']))
                        $buysNotPayed['value'] += $buy['value'] * $buy['products_quantity'];
                    $buysNotPayed['buys'] .= $buy['id'] . ',';
                }
            }
        }

        return $buysNotPayed;
    }

    public function uploadFiles(RoleRequest $request) {

        if($request->isNotAuthorized())
            return redirect()->route('myProfile');

        return view('back.uploadFiles');
    }

    public function profile(RoleRequest $request, $id) {

        if($request->isNotAuthorized())
            return redirect()->route('myProfile');

        $services = [];
        $userprofile = User::find($id);
        if(isset($userprofile->provider))
            $services = Service::whereRaw("provider_id = {$userprofile->provider->id} and isValidate <> 2")->get();

        return view('back.profile', compact('userprofile', 'services'));
    }


    function updateUser(RoleRequest $request)
    {
        if($request->isNotAuthorized())
            return redirect()->route('myProfile');

        $inputs = $request->all();
        $validator = $this->validatorUser($inputs);
        if($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput();

        $this->updateUserSave($request);

        return redirect()->back()->with('success', true);
    }

    private function updateUserSave($request)
    {
        $data = $request->all();
        $user = User::find($data['user_id']);

        /*if ($request->hasFile('profile_image')) {
            $imageName = str_random(10) . '-&&-' . $request->file('profile_image')->getClientOriginalName();
            $request->file('profile_image')->move(base_path() . '/public/uploads/profiles/', $imageName);
            $data['profile_image'] = $imageName;
        }*/
        if ($request->hasFile('profile_image')) unset($data['profile_image']);

        if(!$data['password']) unset($data['password']);
        else $data['password'] = Hash::make($data['password']);

        $user->update($data);
    }

    protected function validatorUser(array $data){

        $v = Validator::make($data, [
                'name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'email' => 'required|email|unique:users,email,' . $data['user_id'],
                'address' => 'required|max:255',
                'birthday' => 'required|date',
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

    public function uploadProfileFile(RoleRequest $request)
    {
        if($request->ajax()){
            $validator = Validator::make($request->all(), ['file' => 'mimes:jpeg,jpg,png|max:4500']);
            if($validator->fails())
                return ['name' => "El archivo es demasiado grande, vuelva a intentarlo", 'url' => url('/uploads/provider/'), 'identifier' => $request->identifier, 'success' => false];

            $file = $request->file('file');
            $fileName = str_random(10) . '-&&-' . $file->getClientOriginalName();
            $file->move(base_path() . '/public/uploads/profiles/', $fileName);

            
            $user = User::find($request->user_id);
            $user->profile_image=$fileName;
            $user->save();
            return response()->json($fileName);
        }
    }


    public function uploadFile(RoleRequest $request)
    {
        if($request->ajax()){
            $validator = Validator::make($request->all(), ['file' => 'mimes:jpeg,jpg,png,pdf|max:20000']);
            if($validator->fails())
                return ['name' => "El archivo es demasiado grande, vuelva a intentarlo", 'url' => url('/uploads/provider/'), 'identifier' => $request->identifier, 'success' => false];

            $file = $request->file('file');
            $fileName = str_random(10) . '-&&-' . $file->getClientOriginalName();
            $file->move(base_path() . '/public/temp/', $fileName);
            return response()->json('/temp/' . $fileName);
        }
    }

    function uploadUserFileFields(RoleRequest $request)
    {
        if($request->isNotAuthorized())
            return redirect()->route('myProfile');

        $inputs = $request->all();
        $validator = Validator::make($inputs, [
            'type1' => 'required|max:255',
            'type2' => 'required|max:255',
            'type3' => 'required|max:255',
            'type4' => 'required|max:255',
            'type5' => 'required|max:255',
            'type6' => 'required|max:255',
            'type7' => 'required|max:255',
        ]);

        if ($validator->fails())
            $this->throwValidationException($request, $validator);

        $user = auth()->user();
        $provider   = $user->provider
                    ? $user->provider
                    : Provider::create(['user_id' => $user->id]);

        foreach ($inputs as $key => $file) {
            if (strpos($key, 'type') !== false) {
                $type = explode('type', $key)[1];
                $fileName = explode('/temp/', $file)[1];
                $data = [
                    'name' => $fileName,
                    'provider_id' => $provider->id,
                    'file_type_id' => $type
                ];

                if (count($provider->providerFiles)) {
                    $files = ProviderFiles::where('provider_id', $provider->id);
                    $files->update($data);
                } else {
                    rename(base_path('public' . $file), base_path('public/uploads/provider/' . $fileName));
                    ProviderFiles::create($data);
                    //En este punto se debe notificar al administrador para la aprobacion del proveedor
                }
            }
        }

        return redirect()->to('admin')->with(['alertTitle' => '¡Solicitud de registro exitosa!', 'alertText' => 'Una vez aprobado tu perfil, podras postular tus servicios! recibiras un correo de confirmacion!']);
    }

    public function updateStateService(RoleRequest $request)
    {
        if($request->isNotAuthorized())
            return redirect()->route('myProfile');

        $service = Service::find($request->input('idService'));
        $service->isActive = $request->input('valor');

        if($service->save())
            return response()->json(['success' => true]);
        return response()->json(['success' => false]);
    }

    /*public function isProvider($user_id)
    {
        if (Provider::where('user_id', $user_id)->first())
            return true;
        return false;
    }*/

    /*protected function validatorFiles($data)
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
    }*/

    /*private function createProvider($user_id)
    {
        $provider = new Provider([
            'isActive' => false,
            'user_id' => $user_id,
        ]);

        $provider->save();

        return $provider->id;
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
    }*/

    /*function uploadProviderFiles(RoleRequest $request)
    {
        if($request->isNotAuthorized())
            return redirect()->route('myProfile');

        $validator = $this->validatorFiles($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        dd($request->all());

        $this->updloadProviderFilesSave($request);
        return redirect()->back()->with('success', true);
    }*/

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
}
