<?php

namespace City\Http\Controllers\admin;

use City\Entities\FoodType;
use City\Entities\GeneralType;
use City\Entities\PetSize;
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

        return redirect()->route('addService')->with(['alertTitle' => '¡Producto creado!', 'alertText' => 'El producto se ha creado satisfactoriamente']);
    }


    private function validator($inputs)
    {
        $rules = [
            'service' => 'required',
            'location' => 'required',
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
        //dd($userprofile);
        return view('back.profile', compact('userprofile'));
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

        $v = Validator::make($data, [
                'name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'email' => 'unique:users,email,' . $data['user_id'],
                'address' => 'required|max:255',
                'birthday' => 'date',
                'cellphone' => 'required|max:255',
            ]
        );
        $v->sometimes('profile_image', 'mimes:jpeg,jpg,png,gif|max:20000', function ($data) {
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
        $return = ['name' => $fileName, 'url' => url('/uploads/provider/' . $fileName), 'identifier' => $request->identifier, 'success' => true];
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
        ]);
    }
}
