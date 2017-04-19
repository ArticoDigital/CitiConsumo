<?php

namespace City\Http\Controllers;

use City\Services\ZonaPagos;
use City\Entities\FoodType;
use City\Entities\PetSize;
use Illuminate\Http\Request;
use City\Entities\PetBreed;
use City\Entities\GeneralType;
use City\Entities\ServiceType;
use Illuminate\Support\Facades\Mail;
use City\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Validator;

class HomeController extends Controller
{

    public function homeIndex(){
        return view('front.home');
    }

    public function petsIndex(){
        //$breeds = PetBreed::all();
        $sizes = PetSize::all();
        $pets = ServiceType::where('kind_service_id', '1')->get();
        return view('front.pets', compact('pets', 'sizes'));
    }

    public function servicesIndex(){
        //$services = GeneralType::all();
        $services = ServiceType::where('kind_service_id', '2')->get();
        return view('front.generalServices', compact('services'));
    }

    public function foodsIndex(){
        //$foods = FoodType::all();
        $foods = ServiceType::where('kind_service_id', '3')->get();
        return view('front.foods', compact('foods'));
    }

    public function whoweare(){
        return view('front.whoweare');
    }

    public function faq(){
        return view('front.faq');
    }

    public function testimony(){
        return view('front.testimony');
    }

    public function contact(){
        return view('front.contact');
    }
    public function notsupported(){
        return view('front.notsupported');
    }
    

    
    public function contactPost(Request $request){
        $validator = $this->Contactvalidator($request->all());
        if ($validator->fails()) {
             $this->throwValidationException(
                $request, $validator
            );
            
        }
        $data = $request->all();

        Mail::send('emails.contact',
        array(
            'name' => $data['name'],
            'email' => $data['email'],
            'user_message' => $data['message']
        ), function($message)
    {
        $message->from('no-reply@cityconsumo.com');
        $message->to('info@cityconsumo.com', 'Admin')->subject('Contacto de pagina');
    });


        Mail::send('emails.pieza12',
        array(
            'name' => $data['name'],
            'email' => $data['email'],
        ), function($message) use ($data)
            {
                $message->from('no-reply@cityconsumo.com', "Cityconsumo.com");
                $message->to($data['email'],$data['name'])->subject('Recibimos tu solicitud City Consumo');
            });
        //$answer = "El mensaje se ha enviado satisfactoriamente";
        return view('front.contact', ['success' => true]);
         //return redirect()->back()->with('success', true);
       /*
             Mail::send('emails.contact',$data, function($msg) use($data){
            $msg->from('luza.231@hotmail.com');
            $msg->to($data['email'], $data['name'])->subject($data['subject']);
        });
        $answer = "El mensaje se ha enviado satisfactoriamente, pronto nos contactaremos contigo";
         */
    }

    public function documents(){
        return view('front.documents');
    }
    
    public function terms(){
        return view('front.terms');
    }

    public function finalPay(Request $request){
        $zp = ZonaPagos::create();
        dd($request);
        $zp->insertPayResult($request->all());
    }

    private function Contactvalidator($inputs)
    {
        $rules = [
            'name' => 'required',
            'email' => 'email|required',
            'message' => 'required|min:6',            
        ];        
        return Validator::make($inputs, $rules);
    }

}
