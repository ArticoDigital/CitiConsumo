<?php

namespace City\Http\Controllers\admin;

use Illuminate\Http\Request;

use City\Http\Requests\RoleRequest;
use City\Entities\Buy;
use City\Entities\Outlay;
use City\Entities\Provider;
use City\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BuyController extends Controller
{
    public function outlayList(RoleRequest $request){
        if($request->isNotAuthorized())
            return redirect()->route('myProfile');
        
        $outlays = Outlay::with(['provider'])->where('isPayed', 0)->get();
        return view('back.outlay', compact('outlays'));
    }

    public function insertOutlay(RoleRequest $request){

        if($request->isNotAuthorized())
            return redirect()->route('myProfile');
        
        $inputs = $request->all();
        foreach (explode(',', $inputs['buys_id']) as $buy_id){
            $buy = Buy::find($buy_id);
            if(isset($buy))
                $buy->update(['state_id' => 2]);
        }

        Outlay::create([
            'value' => $inputs['value'],
            'buys_id' => $inputs['buys_id'],
            'provider_id' => auth()->user()->provider->id,
            'isPayed' => 0
        ]);

        return redirect()->route('myProfile')->with(['alertTitle' => '¡Solicitud de desembolso!', 'alertText' => 'La solicitud de desembolso ha sido exitosa. Te informaremos cuando el monto solicitado sea consignado a tu cuenta.']);
    }

    public function updateOutlateState(RoleRequest $request, $id){
        
        if($request->isNotAuthorized())
            return redirect()->route('myProfile');
        
        $outlay = Outlay::find($id);
        $outlay->update([
            'isPayed' => 2,
            'id_user' => auth()->user()->id
        ]);
        return ['message' => 'El desembolso ha sido exitoso.'];
    }

    public function buyAction(RoleRequest $request){

        if($request->isNotAuthorized())
            return redirect()->route('myProfile');
        
        $data = [''];
        $data['service_id'] =  $request->input('idService');
        $data['products_quantity'] =  $request->input('quantity');
        /* para el registro del desembolso */
        $data['state_id'] =  1;
        $data['value'] =  $request->input('value');
        $data['user_id'] =  Auth::user()->id;

        Buy::create($data);

        return redirect()->to('admin')->with(['alertTitle' => 'Compra exitosa', 'alertText' => 'Felicitaciones su compra se ha realizado con éxito']);

    }

}
