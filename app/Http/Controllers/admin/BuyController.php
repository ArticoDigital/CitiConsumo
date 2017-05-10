<?php

namespace City\Http\Controllers\admin;

use Carbon\Carbon;
use City\Services\ZonaPagos;
use Illuminate\Http\Request;

use City\Http\Requests\RoleRequest;
use City\Entities\Buy;
use City\Entities\Service;
use City\Entities\Outlay;
use City\Entities\Provider;
use City\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use  Validator;

class BuyController extends Controller
{
    public function outlayList(RoleRequest $request)
    {
        if ($request->isNotAuthorized())
            return redirect()->route('myProfile');

        $outlays = Outlay::with(['provider'])->where('isPayed', 0)->get();
        return view('back.outlay', compact('outlays'));
    }

    public function insertOutlay(RoleRequest $request)
    {

        if ($request->isNotAuthorized())
            return redirect()->route('myProfile');
        $isOutlay = Outlay::where('provider_id',auth()->user()->provider->id)->where('isPayed',0)->count();
        if( $isOutlay )
            return redirect()->route('myProfile')->with(['alertTitle' => 'Ud ya ha solicitado un desembolso']);
        $inputs = $request->all();
        $adminCont = new AdminController();
        $buysId = explode(',', $adminCont->getBuysNotPayed( auth()->user() )['buys'] );
        array_pop($buysId);
        Buy::whereIn('id', $buysId)->update(['state_id' => 2]);
        Outlay::create([
            'value' => $inputs['value'],
            'buys_id' => implode(',',$buysId),
            'provider_id' => auth()->user()->provider->id,
            'isPayed' => 0
        ]);
        return redirect()->route('myProfile')->with(['alertTitle' => '¡Solicitud de desembolso!', 'alertText' => 'La solicitud de desembolso ha sido exitosa. Te informaremos cuando el monto solicitado sea consignado a tu cuenta.']);
    }

    public function updateOutlateState(RoleRequest $request, $id)
    {

        if ($request->isNotAuthorized())
            return redirect()->route('myProfile');

        $outlay = Outlay::find($id);
        $buysId = explode(',', $outlay->buys_id);

        Buy::whereIn('id', $buysId)->update(['state_id' => 3]);

        $outlay->update([
            'isPayed' => 2,
            'id_user' => auth()->user()->id
        ]);

        return ['message' => 'El desembolso ha sido exitoso.'];
    }

    public function viewOutlateDetails(RoleRequest $request, $id)
    {

        if ($request->isNotAuthorized())
            return redirect()->route('myProfile');

        $outlay = Outlay::find($id);
        $buysId = explode(',', $outlay->buys_id);

        $buys=Buy::whereIn('id', $buysId)->with(['user', 'service.serviceType'])->get();
        
        return view('back.outlayDetails', compact('buys','outlay'));

        
    }

    public function buyAction(RoleRequest $request)
    {

        if ($request->isNotAuthorized())
            return redirect()->route('myProfile');
        $user = Auth::user();
        if (empty($user->user_identification)) {
            return redirect()->back()
                ->withErrors(['identification' => ''])
                ->withInput();
        }
        $v = Validator::make($request->all(), [
            'quantity' => 'required|numeric|max:100',
            'day' => 'required',
        ]);
        if ($v->fails())
            return redirect()->back()->withErrors(['form' => 'ds']);


        $inputs = $request->all();
        $user = auth()->user();
        $user->update($inputs);

        if ($user->whereHas('buys', function ($q) {
            $q->where('zp_state', '999')->orWhere('zp_state', '888');
        })->count()
        ) {
            return redirect()->back()
                ->withErrors(['pending' => 'Tiene una compra pendiente, por favor espere que nuestro sistema valide el pago, esto puede tardar algunos minutos'])
                ->withInput();
        }

        $service = Service::find($inputs['idService']);
        $inputs["description"] = $service->description;
        $inputs["price"] = str_replace(".", "", $service->price);
        $user = auth()->user();
        $inputs["email"] = $user->email;
        $inputs["user_identification"] = $user->user_identification;
        $inputs["nombre_cliente"] = $user->name;
        $inputs["last_name"] = $user->last_name;
        $inputs["cellphone"] = $user->cellphone;
        $inputs["idUser"] = $user->id;

        $inputs["id_pay"] = date('YmdHis') . rand(100, 999);

        Buy::create([
            'zp_state' => '-1',
            'zp_pay_id' => $inputs["id_pay"],
            'value' => $inputs["price"],
            'products_quantity' => $inputs["quantity"],
            'user_id' => $inputs["idUser"],
            'service_id' => $inputs['idService'],
            'date_service' => $inputs['day'],
            'state_id' => 1,
        ]);


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

    public function tradeList()
    {
        Carbon::setLocale('es');
        if (auth()->user()->provider) {
            $buys = Buy::with(['service.provider.user', 'service.serviceType'])->where('user_id', auth()->user()->id)->get();
            //$services = Service::where('provider_id', auth()->user()->provider->id)->with('buys')->get();
            $providerId = auth()->user()->provider->id;
            $sales = Buy::whereIn('service_id', function($query) use ($providerId) {
                $query->select('id')
                    ->from('services')
                    ->where('provider_id',$providerId)
                    ->where('state_id','>=','1')
                    ->where('zp_state','=','1');
            })->with(['user', 'service.serviceType'])->get();
            return view('back.tradeList', compact('buys', 'sales'));
        } else {
            $buys = Buy::with(['service.provider.user', 'service.serviceType'])->where('user_id', auth()->user()->id)->get();
            $sales = null;
            return view('back.tradeList', compact('buys', 'sales'));
            //return redirect()->to('admin');
        }
    }

    public function BuyDetailClient(RoleRequest $request, $id)
    {
        if ($request->isNotAuthorized())
            return redirect()->route('myProfile');
        $user=auth()->user();

        //$buys = Buy::with(['user', 'service.serviceType'])->where('id', $id)->get();
        $buys = Buy::with('user', 'service.serviceType')->find($id);
        if(!$user->isAdmin()){
            if($user->id == $buys->service->provider->user->id || $user->id == $buys->user->id){
                if($buys->state_id>=1 and $buys->zp_state>=1 ){
                    return view('back.serviceDetailUser', compact('buys'));
                }else{
                    return redirect()->route('tradeList')->with(['alertTitle' => 'Acción no permitida, compra aún no aprobada']);
                }

            }else{
                return redirect()->route('tradeList')->with(['alertTitle' => 'Acción no permitida']);
            }
        }
        return view('back.serviceDetailUser', compact('buys'));

        //$service = Service::with('pet', 'food', 'general', 'serviceFiles')->find($buys->service_id);
        
        //dd($buys->service->description);
        
    }

}
