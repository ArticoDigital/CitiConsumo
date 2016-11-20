<?php

namespace City\Http\Controllers\admin;

use City\Services\ZonaPagos;
use Illuminate\Http\Request;

use City\Http\Requests\RoleRequest;
use City\Entities\Buy;
use City\Entities\Service;
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

        $inputs = $request->all();
        $user = auth()->user();
        $user->update($inputs);
        $inputs["id_pay"] = date('YmdHis') . rand(100, 999);
        $zp = ZonaPagos::create();
        $id = $zp->invoiceRequest($inputs);

        return redirect()->to("https://www.zonapagos.com/" . env('ZP_ROUTE_CODE') . "/pago.asp?estado_pago=iniciar_pago&identificador=" . $id);

/*        Buy::create([
            'service_id' => $inputs['idService'],
            'products_quantity' => $inputs['quantity'],
            /* para el registro del desembolso */
    /*        'state_id' => 1,
            'value' => $inputs['value'],
            'user_id' => Auth::user()->id
        ]);*/
        

        /*return redirect()->to('admin')->with(['alertTitle' => 'Compra exitosa', 'alertText' => 'Felicitaciones su compra se ha realizado con éxito']);*/
    }

    public function tradeList(){
        if(auth()->user()->provider){
            $buys = Buy::where('user_id', auth()->user()->id)->get();
            $services = Service::with('buys')->where('provider_id', auth()->user()->provider->id)->get();
            return view('back.tradeList', compact('buys', 'services'));
        }
    }

}
