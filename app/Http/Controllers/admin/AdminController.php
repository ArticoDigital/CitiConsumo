<?php

namespace City\Http\Controllers\admin;

use Illuminate\Http\Request;
use City\Http\Requests;
use City\Http\Controllers\Controller;
use City\Entities\Service;
use Validator;

use City\User;
use City\Entities\Provider;
use City\Entities\ProviderFiles;
//use Illuminate\Support\Facades\Validator;

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
/*

    public function uploadFiles(){
        return view('back.uploadFiles');
    }

    public function profile(){
        return view('back.profile');
    }
*/
    public function uploadFiles($id){
        if($this->isProvider($id)){
            $provider_id = Provider::where('user_id', $id)->first();
        //$client = $user->client;
            $providerfiles = ProviderFiles::where('provider_id', $provider_id)->get();
            return view('back.uploadFiles', compact('providerfiles'));
        }else{
            return view('back.uploadFiles');

        }
         
    }

    public function profile($id){
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

    private function updateUserSave($request){
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
        /*if(empty($data->password)){
            $user->password = bcrypt($data['password']);
            $user['password_2'] = md5($data['password']);

        }
       */
        if ($request->hasFile('profile_image')) {
            $imageName = $request->file('profile_image')->getClientOriginalName();
            $request->file('profile_image')->move(base_path() . '/public/uploads/profiles/', $imageName);

            $user['profile_image'] = $imageName;

        }
        $user->email = $data['email'];

        $user->save();

    }



    

    protected function validatorUser(array $data)
    {

        $v =  Validator::make($data, [
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'unique:users,email,'.$data['user_id'],
            'address'=> 'required|max:255',
            'birthday' => 'date',
            'cellphone' => 'required|max:255',
        
        ],
            [
                'name.required' => 'El nombre es obligatorio',
                'last_name.required' => 'El Apellido es obligatorio',
               /* 'identification-number.required' => 'El número de identificación es obligatorio',
               */
                'email.required' => 'El Email es obligatorio',
                'email.unique' => 'Este mail ya esta registrado',
                /*'password.required' => 'La contraseña es obligatoria',
                'password.confirmed' => 'Las contraseñas deben coincidir',
                'password.min' => 'La contraseña debe contener mas de 6 caráteres',*/
                'profile_image.mimes' => 'El archivo debe ser una imagen',
                'profile_image.required' => 'La imagen es obligatoria',
                'profile_image.max' => 'La imagen no debe ser mayor a 2M',
                 'cellphone.required' => 'El celular es obligatorio',

                 'address.required' => 'La dirección es obligatoria',

                /*'sector.required' => 'El campo sector es obligatorio',
                'country.required' => 'El campo país es obligatorio',
                
                'company.required' => 'La empresa es obligatorio',
                'activities.required' => 'La actividad es obligatorio',
                'what-i-do.required' => 'A que me dedico:    es obligatorio',
               
                'mobile-1.required' => 'El Teléfono móvil: es obligatorio',*/
            ]

        );
        $v->sometimes('profile_image', 'mimes:jpeg,jpg,png,gif|max:20000', function($data) {
            return !empty($data['profile_image']);
        });
        /*$v->sometimes('password', 'min:6', function($data) {
            return !empty($data->password);
        });*/


        return $v;

    }


    public function uploadFile(Request $request)
    {
        $fileName = $request->file('file')->getClientOriginalName();
        $request->file('file')->move(base_path() . '/public/uploads/provider/', $fileName);
        $return = ['name' => $fileName, 'url' => url('/uploads/provider/' . $fileName), 'identifier' => $request->identifier , 'success' => true];
        return response()->json($return);
    }

    function uploadProviderFiles(Request $request)
    {
        $validator = $this->validatorfiles($request->all());

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
        $validator = $this->validatorFiles($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $data = $request->all();
        $user_id=$data['user_id'];
        if($this->isProvider($user_id)){
            $this->updateFilesFields($request,$user_id);
        }
        else{
            $provider_id=$this->createProvider($user_id);
            $this->createFilesFields($request,$provider_id);
            //En este punto se debe notificar al administrador para la aprobacion del proveedor
        }

        return redirect()->back()->with('success', true);
    }

    public function isProvider($user_id){
        if(Provider::where('user_id', $user_id)->first()){
            return true;
        }
        else{
            return false;
        }
    }

    private function createProvider($user_id){
          $provider = new Provider([
            'isActive' => false,
            'user_id' => $user_id,
        ]);
        $provider->save();

        return $provider->id;
    }

      private function createFilesFields($request,$provider_id){
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
    }

private function updateFilesFields($request,$user_id){
        $data = $request->all();

        $provider = Provider::where('user_id', $user_id)->first();
        $provider_id = $provider->id;
        //$client = $user->client;
        
        $file1 = ProviderFiles::where('provider_id',$provider_id)->where('file_type_id','3')->first();
        $file1->name = $data['RutFileName'];
        $file1->provider_id = $provider_id;
        $file1->file_type_id = 3;
        $file1->save();

        $match1 = ['provider_id'=>$provider_id, 'file_type_id'=>1];
        $file1 = ProviderFiles::where($match1)->first();
        $file1->name = $data['CCFileName'];
        $file1->provider_id = $provider_id;
        $file1->file_type_id = 1;
        $file1->save();

        $match1 = ['provider_id'=>$provider_id, 'file_type_id'=>5];
        $file1 = ProviderFiles::where($match1)->first();
        $file1->name = $data['BankFileName'];
        $file1->provider_id = $provider_id;
        $file1->file_type_id = 5;
        $file1->save();
       
       $match1 = ['provider_id'=>$provider_id, 'file_type_id'=>4];
       $file1 = ProviderFiles::where($match1)->first();
        $file1->name = $data['ServicesFileName'];
        $file1->provider_id = $provider_id;
        $file1->file_type_id = 4;
        $file1->save();

        $match1 = ['provider_id'=>$provider_id, 'file_type_id'=>2];
        $file1 = ProviderFiles::where($match1)->first();
        $file1->name = $data['HistoryFileName'];
        $file1->provider_id = $provider_id;
        $file1->file_type_id = 2;
        $file1->save();
    }



    protected function validatorFiles(array $data)
    {

        $v =  Validator::make($data, [
            'RutFileName' => 'required|max:255',
            'CCFileName' => 'required|max:255',
            'BankFileName' => 'required|max:255',
            'ServicesFileName'=> 'required|max:255',
            'HistoryFileName' => 'required|max:255',
        
        ],
            [
                'RutFileName.required' => 'El Rut es obligatorio',
                'CCFileName.required' => 'La copia de la identificación es obligatoria',
                'BankFileName.required' => 'El certificado bancario es obligatorio',
                'ServicesFileName.required' => 'La copia de servicios publicos es obligatoria',
                'HistoryFileName.required' => 'El antecedente de procuraduría es obligatorio',

                
               /* 'identification-number.required' => 'El número de identificación es obligatorio',
               */
            ]

        );

        return $v;

    }
}
