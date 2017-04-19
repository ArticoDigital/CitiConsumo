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
use Illuminate\Support\Facades\Mail;

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

    public function deleteProductProvider(RoleRequest $request, $id){//HAbilita o deshabilita el producto de un usuario.

        if($request->isNotAuthorized())
            return redirect()->route('myProfile');

        $service = Service::find($id);
        $services = Service::where('isValidate', 0);
        
            $service->update(['isValidate' => 2]);
            $message = "EL servicio ha sido eliminado.";
            $user = $service->provider->user;
            Mail::send('emails.pieza9',
            array(
                'name' => $user->name,
                'last_name' => $user->last_name,
                'service' => $service->serviceType->name,
            ), function($message) use ($user)
                {
                    $message->from('no-reply@cityconsumo.com', "Cityconsumo.com");
                    $message->to($user->email, $user->name)->subject('Lo sentimos, tu servicio debe ser corregido');
                });
        

        if ($request->ajax())
            return ['message' => $message, 'services' => $services];
    }

    public function enableProductProvider(RoleRequest $request, $id){//HAbilita el producto de un usuario.

        if($request->isNotAuthorized())
            return redirect()->route('myProfile');

        $service = Service::find($id);
        $services = Service::where('isValidate', 0);

        
            $service->update(['isValidate' => 1, 'isActive' => 1]);
            $message = "EL servicio ha sido activado.";
            $user = $service->provider->user;
            Mail::send('emails.pieza8',
            array(
                'name' => $user->name,
                'last_name' => $user->last_name,
                'service' => $service->serviceType->name,
            ), function($message) use ($user)
                {
                    $message->from('no-reply@cityconsumo.com', "Cityconsumo.com");
                    $message->to($user->email, $user->name)->subject('¡Felicidades ya tus servicios están en activos en CityConsumo!');
                });
         

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

        Mail::send('emails.pieza5',
        array(
            'name' => $user->name,
            'last_name' => $user->last_name,
        ), function($message) use ($user)
            {
                $message->from('no-reply@cityconsumo.com', "Cityconsumo.com");
                $message->to($user->email, $user->name)->subject('¡Ya eres un proveedor de Cityconsumo!');
            });

        return json_encode(['success' => true]);
    }

    public function disabledProvider(RoleRequest $request) { //Funcion llamada cuando un usuario no se habilita como proveedor debe hacerse un correo? debe eliminarse el registro de provider?

        if($request->isNotAuthorized())
            return redirect()->route('myProfile');

        $provider = Provider::find($request->input('idUser'));
        $user = $provider->user;
        //$provider->isActive = 0; //0
        //$provider->save();
        //$provider->providerFiles()->delete();
        $provider->delete();
        

        Mail::send('emails.pieza6',
        array(
            'name' => $user->name,
            'last_name' => $user->last_name,
        ), function($message) use ($user)
            {
                $message->from('no-reply@cityconsumo.com', "Cityconsumo.com");
                $message->to($user->email, $user->name)->subject('¡Ops tu registro no ha sido aprobado!');
            });

        

        return json_encode(['success' => true]);
    }

    public function deleteProvider(RoleRequest $request) {

        if($request->isNotAuthorized())
            return redirect()->route('myProfile');

        $provider = Provider::find($request->input('idUser'));
        $user = $provider->user;
        $user->role_id = 1; //deja de tener el rol de proveedor
        $user->save();
        //$provider->delete();
        $provider->isActive=2; //Se le asigna valor 2 para identificar al proveedor deshabilitado
        $provider->save();
        //$services = Service::whereRaw('isValidate=1 and isActive=1');
        $affectedRows = Service::whereRaw('isValidate=1 and isActive=1 and provider_id=?',[$provider->id])->update(['isValidate' => 3]);

        Mail::send('emails.pieza3',
        array(
            'name' => $user->name,
        ), function($message) use ($user)
            {
                $message->from('no-reply@cityconsumo.com', "Cityconsumo.com");
                $message->to($user->email, $user->name)->subject('Lo sentimos la cuenta ha sido deshabilitada');
            });


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
        $affectedRows = Service::whereRaw('isValidate=3 and isActive=1 and provider_id=?',[$provider->id])->update(['isValidate' => 1]);
        return json_encode(['success' => true]);
    }
}
