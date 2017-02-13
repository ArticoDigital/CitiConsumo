<?php

namespace City\Http\Controllers\Admin;

use City\Entities\FileType;
use City\Entities\Provider;
use City\Entities\Service;
use City\Entities\ProviderFiles;
use City\User;
use Illuminate\Http\Request;

use City\Http\Requests\RoleRequest;
use City\Http\Controllers\Controller;

class UserController extends Controller
{
    public function showClient(RoleRequest $request){

        if($request->isNotAuthorized())
            return redirect()->route('myProfile');

        $users = User::where('role_id', '1')->paginate(20);
        return view('back.usersClient', compact('users'));
    }

    public function showProvider(RoleRequest $request) {

        if($request->isNotAuthorized())
            return redirect()->route('myProfile');

        $providers = Provider::with('user')->where("isActive",1)->get();
        return view('back.usersProvider', compact('providers'));
    }

    public function showProviderActive(RoleRequest $request) {

        if($request->isNotAuthorized())
            return redirect()->route('myProfile');

        $providers = Provider::with(['user','providerFiles.fileType'])->whereRaw('isActive = 0')->get();
        return view('back.usersProviderActive', compact('providers'));
    }

    public function showProviderDelete(RoleRequest $request) {

        if($request->isNotAuthorized())
            return redirect()->route('myProfile');

        $providers = Provider::with('user')->whereRaw('isActive = 2')->get();
        return view('back.usersProviderDelete', compact('providers'));
    }

    public function showProductsInactived(RoleRequest $request){

        if($request->isNotAuthorized())
            return redirect()->route('myProfile');

        $services = Service::where('isValidate', 0)->paginate(20);
        return view('back.produtsCheckout', compact('services'));
    }
    public function showProductsDeleted(RoleRequest $request){

        if($request->isNotAuthorized())
            return redirect()->route('myProfile');

        $services = Service::where('isValidate', 2)->paginate(20);
        return view('back.productsDeleted', compact('services'));
    }

    public function deleteProductProvider(RoleRequest $request, $id){

        if($request->isNotAuthorized())
            return redirect()->route('myProfile');

        $service = Service::find($id);
        $services = Service::where('isValidate', 0);

        if (!$request->value) {
            $service->update(['isValidate' => 1, 'isActive' => 1]);
            $message = "EL usuario ha sido activado.";
        } else {
            $service->update(['isValidate' => 1]);
            $message = "EL usuario ha sido eliminado.";
        }

        if ($request->ajax())
            return ['message' => $message, 'services' => $services];
    }

    public function enabledProvider(RoleRequest $request) {

        if($request->isNotAuthorized())
            return redirect()->route('myProfile');

        $provider = Provider::find($request->input('idUser'));
        $user = $provider->user;
        $user->role_id = 2;
        $user->save();

        $provider->isActive = 1;
        $provider->save();
        return json_encode(['success' => true]);
    }

    public function disabledProvider(RoleRequest $request) { //Funcion llamada cuando un usuario no se habilita como proveedor debe hacerse un correo? debe eliminarse el registro de provider?

        if($request->isNotAuthorized())
            return redirect()->route('myProfile');

        $provider = Provider::find($request->input('idUser'));
        $provider->isActive = 0; //0
        $provider->save();
        return json_encode(['success' => true]);
    }

    public function deleteProvider(RoleRequest $request) {

        if($request->isNotAuthorized())
            return redirect()->route('myProfile');

        $provider = Provider::find($request->input('idUser'));
        $user = $provider->user;
        $user->role_id = 1;
        $user->save();
        //$provider->delete();
        $provider->isActive=2; //Se le asigna valor 2 para identificar al proveedor deshabilitado
        $provider->save();
        return json_encode(['success' => true]);
    }

    public function reenableProvider(RoleRequest $request) {

        if($request->isNotAuthorized())
            return redirect()->route('myProfile');

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
