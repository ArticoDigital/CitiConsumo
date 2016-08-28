<?php

namespace City\Http\Controllers;

use City\Entities\Service;
use Illuminate\Http\Request;

use City\Http\Requests;
use Illuminate\Support\Facades\DB;
use Validator;

class MapController extends Controller
{
    public function index($service, Request $request)
    {
        $validate = $this->validator($request->all(), $service);
        if ($validate->fails())
            return redirect()->back()->withInput()->with(['alertTitle' => 'Búsqueda', 'alertText' => $validate->errors()->first()]);

        $dataMap = ['lng' => $request->get('lng'), 'lat' => $request->get('lat')];
        $services = $this->queryBuild($dataMap, 2, $this->addWhere($request));
        return view('front.platform', compact('dataMap', 'services'));
    }

    private function addWhere($request)
    {
        if ($request->get('typeService') == "pet") {
            return "";
            $date = explode('-',$request->get('date'));

            return " AND pets.date_start BETWEEN '" . $date[0] . "' AND '" . $date[1] . "'
             AND pets.pet_sizes = '" . $request->get('size') . "' ";
        }
        if ($request->get('typeService') == "food") {
            return "";
        }
        if ($request->get('typeService') == "general") {
            return "";
        }

    }

    private function queryBuild($dataMap, $distance, $addWhere)
    {
        $box = $this->getBoundaries($dataMap['lat'], $dataMap['lng'], $distance);
        return DB::select('SELECT *, service_files.name as nameFile, (6371 * ACOS(
                                            SIN(RADIANS(lat))
                                            * SIN(RADIANS(' . $dataMap['lat'] . '))
                                            + COS(RADIANS(lng - ' . $dataMap['lng'] . '))
                                            * COS(RADIANS(lat))
                                            * COS(RADIANS(' . $dataMap['lat'] . '))
                                            )
                               ) AS distance
                     FROM services
                     INNER JOIN service_files ON service_files.service_id = services.id
                     WHERE (lat BETWEEN ' . $box['min_lat'] . ' AND ' . $box['max_lat'] . ')
                     AND (lng BETWEEN ' . $box['min_lng'] . ' AND ' . $box['max_lng'] . ')
                     AND (isValidate = 1)
                     AND (isActive = 1)' .
            $addWhere .
            'HAVING distance  < ' . $distance . '
                     ORDER BY distance ASC ');
    }

    private function validator($inputs, $service)
    {

        if ($service == 'mascotas') {
            $rules = [
                'lat' => 'required',
                'lng' => 'required',
                'date' => 'required',
                'breed' => 'required',
                'size' => 'required'
            ];
        } else if ($service == 'comidas') {
            $rules = [
                'lat' => 'required',
                'lng' => 'required',
                'date' => 'required',
                'food_type' => 'required'
            ];
        } else {
            $rules = [
                'lat' => 'required',
                'lng' => 'required',
                'date' => 'required',
                'service' => 'required'
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
