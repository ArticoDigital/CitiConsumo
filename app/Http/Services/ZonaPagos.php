<?php

namespace Agrosellers\Services;
use GuzzleHttp\Client;
use Agrosellers\Entities\Order;

class ZonaPagos {

    private $client;
    private $key;
    private $shop;
    private $serviceCode;
    private $routeCode;
    private $iva;
    private $transact;

    public function __construct(){
        $this->key = env('ZP_KEY');
        $this->shop = env('ZP_SHOP');
        $this->serviceCode = env('ZP_SERVICE_CODE');
        $this->routeCode = env('ZP_ROUTE_CODE');
        $this->iva = env('IVA');
        $this->transact = env('CITY_TRANSACT');
        $this->client = new Client();
    }

    /** Retorna los datos y estado del pago **/

    public function checkPay($payId){
        $url = 'https://www.zonapagos.com/api_verificar_pagoV3/api/verificar_pago_v3';
        $data = [
            'body' => [
                'str_id_clave' => $this->key,
                'int_id_tienda' => $this->shop,
                'str_id_pago' => $payId,
            ]
        ];
        $response = $this->client->post($url, $data);
        return $response->getBody()->getContents();
    }

    /** Retorna el id del pago **/

    public function invoiceRequest($inputs){
        $url = 'https://www.zonapagos.com/api_inicio_pago/api/inicio_pagoV2';
        $iva = $inputs['total_con_iva'] * $this->iva / 100;
        $total = $inputs['total_con_iva'] + ($inputs['total_con_iva'] * $this->transact / 100);

        $data = [
            'body' => [
                "id_tienda" => $this->shop,
                "clave" => $this->key,
                "codigo_servicio_principal" => $this->serviceCode,
                "total_con_iva"  => $total,
                "valor_iva" => $iva,
                "email" => auth()->user()->email,
                "id_pago" => $inputs["id_pago"],
                "id_cliente" => $inputs["id_cliente"],
                "tipo_id" => $inputs["tipo_id"],
                "nombre_cliente" => $inputs["nombre_cliente"],
                "apellido_cliente" => $inputs["apellido_cliente"],
                "descripcion_pago" => $inputs["descripcion_pago"],
                "telefono_cliente" => $inputs["telefono_cliente"],
                "info_opcional1" => $inputs["info_opcional1"],
                "info_opcional2" => ".",
                "info_opcional3" => ".",
                "lista_codigos_servicio_multicredito" => "",
                "lista_nit_codigos_servicio_multicredito" => "",
                "lista_valores_con_iva" => "",
                "lista_valores_iva" => "",
                "total_codigos_servicio" => ""
            ]
        ];

        $response = $this->client->post($url, $data);
        return str_replace('"', '',$response->getBody()->getContents());
    }

    public function insertPayResult($inputs){
        dd($inputs);
        /*$order = Order::where('zp_buy_id', $inputs['id_pago'])->first();
        
        $order->update([
            'zp_buy_id' => $inputs['estado_pago'],
            'zp_pay_form' => $inputs['id_forma_pago'],
            'zp_pay_value' => $inputs['valor_pagado'],
            'zp_pay_credit' => $inputs['franquicia'],
        ]);*/
    }

    /** Retorna la instancia de zona pagos **/

    public static function create(){
        return new ZonaPagos();
    }
}