<?php

namespace City\Http\Controllers\Admin;

use City\Entities\Provider;
use City\Entities\Service;
use City\Entities\ProviderFiles;
use City\User;
use Illuminate\Http\Request;

use City\Http\Requests;
use City\Http\Controllers\Controller;

class UserController extends Controller
{
    public function showClient()
    {
        $users = User::where('role_id', '1')->paginate(20);
        return view('back.usersClient', compact('users'));
    }

    public function showProvider()
    {
        $providers = Provider::with('user')->where("isActive",1)->get();
        return view('back.usersProvider', compact('providers'));
    }

    public function showProviderActive()
    {
        $providers = Provider::with(['user','providerFiles.fileType'])->whereRaw('isActive = 0')->get();
        return view('back.usersProviderActive', compact('providers'));
    }
    public function showProviderDelete()
    {
        $providers = Provider::with('user')->whereRaw('isActive = 2')->get();
        return view('back.usersProviderDelete', compact('providers'));
    }

    public function showProductsInactived(){
        $services = Service::where('isValidate', 0)->paginate(20);
        return view('back.produtsCheckout', compact('services'));
    }

    public function deleteProductProvider($id){
        dd('deleteProductProvider');
        return redirect()->route('showProductsInactived')->with(['alertTitle' => '¡Producto Eliminado!', 'alertText' => '<p>El producto se ha eliminado satisfactoriamente.</p>']);
    }

    public function enabledProvider(Request $request)
    {
        $provider = Provider::find($request->input('idUser'));
        $provider->isActive = 1;
        $provider->save();
        return json_encode(['success' => true]);
    }

    public function disabledProvider(Request $request)
    {
        $provider = Provider::find($request->input('idUser'));
        $provider->isActive = 0;
        $provider->save();
        return json_encode(['success' => true]);
    }
    public function deleteProvider(Request $request)
    {
        $provider = Provider::find($request->input('idUser'));
        $user = $provider->user;
        $user->role_id = 1;
        $user->save();
        //$provider->delete();
        $provider->isActive=2; //Se le asigna valor 2 para identificar al proveedor deshabilitado
        $provider->save();
        return json_encode(['success' => true]);
    }
    public function reenableProvider(Request $request)
    {
        $provider = Provider::find($request->input('idUser'));
        $user = $provider->user;
        $user->role_id = 2;
        $user->save();
        //$provider->delete();
        $provider->isActive=1; //Se le asigna valor 2 para identificar al proveedor deshabilitado
        $provider->save();
        return json_encode(['success' => true]);
    }
}
