<?php

namespace City\Http\Controllers;

use Carbon\Carbon;
use City\Entities\Service;
use Illuminate\Http\Request;

use City\Http\Requests;
use Illuminate\Support\Facades\DB;
use League\Flysystem\Exception;
use Validator;

class MapController extends Controller
{
    private $distance = 100;

    public function index($service, Request $request)
    {
        $validate = $this->validator($request->all(), $service);
        if ($validate->fails())
            return redirect()->back()->withInput()->with(['alertTitle' => 'Búsqueda', 'alertText' => $validate->errors()->first()]);
        $dataMap = ['lng' => $request->get('lng'), 'lat' => $request->get('lat')];
        $typeService = $request->get('typeService');
        $services = $this->getModelToService($request, $typeService, $dataMap);
        $icon = $this->icon($typeService);
        $nDays = null;
        if ($service == 'mascotas') {

            $date = explode('-', $request->get('date'));
            $nDays = $this->getNumberDays($date[0], $date[1]);
        }
        $nameService = $service;
        /* dd();*/
        return view('front.platform', compact('dataMap', 'services', 'icon', 'typeService', 'nDays','nameService'));
    }

    private function getNumberDays($start, $end)
    {
        $days = (strtotime($end) - strtotime($start)) / 86400;
        $days = abs($days);
        return (int)floor($days);
    }

    private function getModelToService($request, $service, $dataMap)
    {

        $servicesId = $this->queryBuild($dataMap, $this->distance, $this->addSql($request));
        if ($service == "pet")
            return Service::with(['pet', 'serviceFiles', 'provider.user', 'responseType', 'experienceType', 'pet.sizes'])->whereIn('id', array_pluck($servicesId, 'id'))->paginate(5);
        if ($service == "food")
            return Service::with(['food', 'serviceFiles', 'provider.user', 'responseType', 'experienceType', 'pet.sizes'])->whereIn('id', array_pluck($servicesId, 'id'))->paginate(5);
        if ($service == "general")
            return Service::with(['general', 'serviceFiles', 'provider.user', 'responseType', 'experienceType', 'pet.sizes'])->whereIn('id', array_pluck($servicesId, 'id'))->paginate(5);

    }

    private function icon($service)
    {
        return ($service == 'food') ? 'cocinaIcon.png' : (($service == 'general') ? 'serviciosicon.png' : 'mascotaicon.png');
    }

    private function addSql($request)
    {
        $date = Carbon::parse($request->get('date'));
        $sql = [];
        //$date = explode('-', $request->get('date'));
        $typeServices = implode($request->get('service_type'), ',');
        //$sql['where'] = " AND (date_start <=  '" . Carbon::parse( $date[0] ) . "' AND date_end >= '" . Carbon::parse( $date[1] ). "')
        $sql['where'] = " AND (date_start <=   '" . Carbon::parse( $date ) . "' AND date_end  >='" . $date. "')
            and service_type_id in ($typeServices)";
        return $sql;
        // AND service_type_id = '" . $request->get('service_type') . "' ";

        //$sql['join'] = "INNER JOIN  `pets` ON `pets`.`service_id` = services.id";


        /*
                if ($request->get('typeService') == "pet") {

                    $date = explode('-', $request->get('date'));
                    $sql['where'] = " AND (pets.date_start <=  '" . Carbon::parse( $date[0] ) . "' AND pets.date_end >= '" . Carbon::parse( $date[1] ). "')
                    AND pets.pet_sizes = '" . $request->get('size') . "' ";
                    $sql['join'] = "INNER JOIN  `pets` ON `pets`.`service_id` = services.id";

                    return $sql;
                }
                if ($request->get('typeService') == "food") {
                    $typeFood = implode($request->get('food_type'),',');
                    $sql['where'] = " AND foods.food_time = '" .  Carbon::parse($request->get('date'))  . "'
                     and food_type_id in ($typeFood)";

                    $sql['join'] = "INNER JOIN  `foods` ON `foods`.`service_id` = services.id";
                    return $sql;
                }
                if ($request->get('typeService') == "general") {

                    $typeService = $request->get('service');

                    $sql['where'] = " AND generals.date = '" .  Carbon::parse($request->get('date'))  . "'
                     and general_type_id = ($typeService)";
                    $sql['join'] = "INNER JOIN  `generals` ON `generals`.`service_id` = services.id";
                    return $sql;
                }
        */
    }

    private function queryBuild($dataMap, $distance, $sql)
    {
        $box = $this->getBoundaries($dataMap['lat'], $dataMap['lng'], $distance);

        return DB::select(
            'SELECT services.id , (6371 * ACOS(
                                        SIN(RADIANS(lat))
                                        * SIN(RADIANS(' . $dataMap['lat'] . '))
                                        + COS(RADIANS(lng - ' . $dataMap['lng'] . '))
                                        * COS(RADIANS(lat))
                                        * COS(RADIANS(' . $dataMap['lat'] . '))
                                        )
                           ) AS distance
                FROM services
                WHERE (lat BETWEEN ' . $box['min_lat'] . ' AND ' . $box['max_lat'] . ')
                AND (lng BETWEEN ' . $box['min_lng'] . ' AND ' . $box['max_lng'] . ')
                AND (isValidate = 1)
                AND (isActive = 1)'
            . $sql['where'] . '

                HAVING distance < ' . $distance . '
                ORDER BY distance ASC ;');

    }

    /*      private function queryBuild($dataMap, $distance, $sql)
      {
          $box = $this->getBoundaries($dataMap['lat'], $dataMap['lng'], $distance);

          return DB::select(
                  'SELECT services.id , (6371 * ACOS(
                                          SIN(RADIANS(lat))
                                          * SIN(RADIANS(' . $dataMap['lat'] . '))
                                          + COS(RADIANS(lng - ' . $dataMap['lng'] . '))
                                          * COS(RADIANS(lat))
                                          * COS(RADIANS(' . $dataMap['lat'] . '))
                                          )
                             ) AS distance
                  FROM services
                  '. $sql['join'] .'
                  WHERE (lat BETWEEN ' . $box['min_lat'] . ' AND ' . $box['max_lat'] . ')
                  AND (lng BETWEEN ' . $box['min_lng'] . ' AND ' . $box['max_lng'] . ')
                  AND (isValidate = 1)
                  AND (isActive = 1)'
                  . $sql['where'] .'

                  HAVING distance < ' . $distance . '
                  ORDER BY distance ASC ;');

      }

  */

    private function validator($inputs, $service)
    {

        if ($service == 'mascotas') {
            $rules = [
                'lat' => 'required',
                'lng' => 'required',
                'date' => 'required|date',
                'service_type' => 'required'
            ];
        } else if ($service == 'comidas') {
            $rules = [
                'lat' => 'required',
                'lng' => 'required',
                'date' => 'required',
                'service_type' => 'required'
            ];
        } else {
            $rules = [
                'lat' => 'required',
                'lng' => 'required',
                'date' => 'required',
                'service_type' => 'required'
            ];
        }

        $messages = [
            'lat.required' => 'El campo Dirección es necesario para la busqueda',
            'lng.required' => 'El campo Dirección es necesario para la busqueda',
            'date.required' => 'El campo Fecha es necesario para la busqueda',
            'service.required' => 'El campo Servicio es necesario para la busqueda',
            'breed.required' => 'El campo Raza es necesario para la busqueda',
            'food_type.required' => 'El campo Tipo de comida es necesario para la busqueda',
            'size.required' => 'El campo Tamaño es necesario para la busqueda',
        ];

        return Validator::make($inputs, $rules, $messages);
    }

    private function getBoundaries($lat, $lng, $distance = 1, $earthRadius = 6371)
    {
        $return = array();


        $cardinalCoords = array('north' => '0',
            'south' => '180',
            'east' => '90',
            'west' => '270');
        $rLat = deg2rad($lat);
        $rLng = deg2rad($lng);
        $rAngDist = $distance / $earthRadius;
        foreach ($cardinalCoords as $name => $angle) {
            $rAngle = deg2rad($angle);
            $rLatB = asin(sin($rLat) * cos($rAngDist) + cos($rLat) * sin($rAngDist) * cos($rAngle));
            $rLonB = $rLng + atan2(sin($rAngle) * sin($rAngDist) * cos($rLat), cos($rAngDist) - sin($rLat) * sin($rLatB));
            $return[$name] = array('lat' => (float)rad2deg($rLatB),
                'lng' => (float)rad2deg($rLonB));
        }
        return array('min_lat' => $return['south']['lat'],
            'max_lat' => $return['north']['lat'],
            'min_lng' => $return['west']['lng'],
            'max_lng' => $return['east']['lng']);
    }
}
