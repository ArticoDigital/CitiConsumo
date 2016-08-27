<?php

namespace City\Http\Controllers\Admin;

use City\Entities\Provider;
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
        $providers = Provider::with('user')->get();
        return view('back.usersProvider', compact('providers'));
    }

    public function showProviderActive()
    {
        $providers = Provider::with('user')->whereRaw('isActive = 0')->get();
        return view('back.usersProviderActive', compact('providers'));
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
        $provider->delete();
        return json_encode(['success' => true]);
    }
}
