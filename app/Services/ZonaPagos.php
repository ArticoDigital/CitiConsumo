<?php

namespace City\Services;
use City\Entities\Service;
use City\User;
use GuzzleHttp\Client;
use City\Entities\Buy;
use Illuminate\Support\Facades\Auth;

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

    /** Retorna la instancia de zona pagos **/

    public static function create(){
        return new ZonaPagos();
    }

    /** Retorna los datos y estado del pago **/

    public function checkPay($payId)
    {
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

        $data = [
            'form_params' => [
                "id_tienda" => $this->shop,
                "clave" => $this->key,
                "codigo_servicio_principal" => $this->serviceCode,
                "total_con_iva"  => $inputs["price"]  * $inputs["quantity"],
                "valor_iva" => 0,
                "email" => $inputs["email"],
                "id_pago" => $inputs["id_pay"],
                "id_cliente" => $inputs["user_identification"],
                "tipo_id" => 'cedula',
                "nombre_cliente" => $inputs["nombre_cliente"],
                "apellido_cliente" => $inputs["last_name"],
                "descripcion_pago" => $this->cut_text($inputs["description"]),
                "telefono_cliente" => $inputs["cellphone"],
                "info_opcional1" => $inputs["idService"],
                "info_opcional2" => $inputs["quantity"],
                "info_opcional3" => $inputs["idUser"] ,
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



        $verifiedData = json_decode($this->checkPay($inputs['id_pago']));
        $Buy = Buy::where('zp_buy_id', $inputs['id_pago'])->first();
        $Buy->update([
            'zp_ticket_id' => $verifiedData->res_pagos_v3[0]->str_ticketID,
            'zp_state' => $verifiedData->res_pagos_v3[0]->int_estado_pago,
            'bank' => $verifiedData->res_pagos_v3[0]->str_nombre_banco,
            'transaction_code' => $verifiedData->res_pagos_v3[0]->str_codigo_transaccion,
            'zp_form_pay' => $verifiedData->res_pagos_v3[0]->int_id_forma_pago,
            'date_pay' => $verifiedData->res_pagos_v3[0]->dat_fecha,
            'zp_ticket_id' => $verifiedData->res_pagos_v3[0]->str_ticketID,
        ]);

        /*
         * array:17 [▼
              "id_pago" => "20161119211935352"
              "estado_pago" => "1"
              "id_forma_pago" => "4"
              "valor_pagado" => "102000"

              "ticketID" => "111921193535200007"
              "id_cliente" => "1031146949"
              "codigo_servicio" => "2701"
              "codigo_banco" => "1022"
              "nombre_banco" => "Banco Union Colombiano"
              "codigo_transaccion" => "1202927"
              "ciclo_transaccion" => "1"
              "campo1" => "."
              "campo2" => "."
              "campo3" => "."
              "idcomercio" => "15452"
              "detalle_estado" => "Aprobada"
            ]

         *
         * */
        /*$order = Order::where('zp_buy_id', $inputs['id_pago'])->first();
        
        $order->update([
            'zp_buy_id' => $inputs['estado_pago'],
            'zp_pay_form' => $inputs['id_forma_pago'],
            'zp_pay_value' => $inputs['valor_pagado'],
            'zp_pay_credit' => $inputs['franquicia'],
        ]);*/
    }

    /** Recorta el texto **/

    private function cut_text($text, $limit=65){
        $text = trim($text);
        $text = strip_tags($text);
        $size = strlen($text);
        $result = '';
        if($size <= $limit){
            return $text;
        }else{
            $text = substr($text, 0, $limit);
            $words = explode(' ', $text);
            $result = implode(' ', $words);
            $result .= '...';
        }
        return $result;
    }
}