<?php

namespace City\Http\Controllers\admin;

use Illuminate\Http\Request;

use City\Http\Requests;
use City\Entities\Buy;
use City\Entities\Outlay;
use City\Entities\Provider;
use City\Http\Controllers\Controller;

class BuyController extends Controller
{
    public function outlayList(){
        $outlays = Outlay::with(['provider'])->where('isPayed', 0)->get();
        return view('back.outlay', compact('outlays'));
    }

    public function insertOutlay(Request $request){

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

    public function updateOutlateState(Request $request, $id){
        $outlay = Outlay::find($id);
        $outlay->update([
            'isPayed' => 2,
            'id_user' => auth()->user()->id
        ]);
        return ['message' => 'El desembolso ha sido exitoso.'];
    }

}
