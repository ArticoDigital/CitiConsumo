<?php

use Illuminate\Database\Seeder;
use City\Entities\ServiceType;

class ServiceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ServiceType::create([
            'name' => 'Cuidado de perros ',
            'description' => 'Guarderia',
            'kind_service_id' => '1',
            'rate_types' => 'Hora,Labor,Jornada',
            'service_additions' => 'lavado,paseo,comida,juego,alimento,peluquería,hotel,juguetes de mascotas,veterinaria,adiestramiento'

        ]);
              
        ServiceType::create([
            'name' => 'Paseo de Perros',
            'description' => 'Hotel',
            'kind_service_id' => '1',
            'rate_types' => 'Hora,Labor',
            'service_additions' => 'alimento, peluqueria'
        ]);

        ServiceType::create([
            'name' => 'Cuidado Otras Mascotas',
            'description' => 'Paseador',
            'kind_service_id' => '1',
            'rate_types' => 'Hora,Labor',
            'service_additions' => 'gatos,peces,aves,tortugas'
        ]);

      
ServiceType::create(['name' => 'Aseo','kind_service_id' => '2','service_additions' => 'limpieza tapices,desinfección,limpieza casa,limpieza oficina','rate_types' => 'Hora,Labor,Jornada 4 horas,Jornada 8 horas']);
ServiceType::create(['name' => 'Electricista','kind_service_id' => '2','service_additions' => 'diagnóstico,reparaciónes menores,instalación general,instalaciónes en obra nueva,instalacion medidores,iluminación,arreglos sencillos,sisemas electricos.','rate_types' => 'Labor,Hora,Jornada,Diagnostico']);
ServiceType::create(['name' => 'Plomería','kind_service_id' => '2','service_additions' => 'revisiónes,cambio de plomeria,desatascar tuberías,pequeños trabajos,','rate_types' => 'Servicio,Hora,Metro lineal']);
ServiceType::create(['name' => 'Limpieza Alformbras','kind_service_id' => '2','service_additions' => 'sofás,sillas,alfombras,otros','rate_types' => 'Metro cuadrado,Labor,Jornada']);
ServiceType::create(['name' => 'Ayuda Mudanzas','kind_service_id' => '2','service_additions' => 'casa,oficina,local','rate_types' => 'Labor,Hora']);
ServiceType::create(['name' => 'Jardinería Básica','kind_service_id' => '2','service_additions' => 'mantenimiento del jardín,plantar jardín,instalación de sistemas de riego,pequeños trabajos de jardinería,paisajistas,cesped artifical.','rate_types' => 'Labor,Hora,Metro cuadrado']);
ServiceType::create(['name' => 'Carpintería','kind_service_id' => '2','service_additions' => 'pequeños trabajos,ebanista,muebles a medida,carpintería metalica,carpintería aluminio,restauración','rate_types' => 'Labor,Hora,Cotizar']);
ServiceType::create(['name' => 'Pintor','kind_service_id' => '2','service_additions' => 'pintar exteriores,pintar interiores,pequeños trabajos','rate_types' => 'Metro cuadrado,Labor,Jornada']);
ServiceType::create(['name' => 'Mecánico Carros','kind_service_id' => '2','service_additions' => 'reparación,tuning,electrico,motor,','rate_types' => 'Diagnóstico,Instalacion']);
ServiceType::create(['name' => 'Mecánico Motos','kind_service_id' => '2','service_additions' => 'reparación,tuning,electrico,alto cilindraje,auteco,akt,honda,susuki','rate_types' => 'Diagnóstico,Instalción']);
ServiceType::create(['name' => 'Mantenimiento Computadores','kind_service_id' => '2','service_additions' => 'diagnostico,reparaciónes menores,hardware,software,soluciones de virus,portatiles,pc escritorios,tablets,celulares,servicio Mac,servicio Windows,','rate_types' => 'Labor,Hora,Jornada,Equipo']);
ServiceType::create(['name' => 'Mantenimiento Electrodomésticos','kind_service_id' => '2','service_additions' => 'lavadoras,hornos microondas,secadoras,estufas,','rate_types' => 'Labor']);
ServiceType::create(['name' => 'Chef a domicilio','kind_service_id' => '3','service_additions' => 'cocina internacional,cocina nacional,','rate_types' => 'servicio']);
ServiceType::create(['name' => 'Venta de desayunos','kind_service_id' => '3','service_additions' => 'domicilio,casero,restaurante','rate_types' => 'Plato,Servicio']);
ServiceType::create(['name' => 'Venta de almuerzos','kind_service_id' => '3','service_additions' => 'domicilio,casero,restaurante','rate_types' => 'Jornada,Servicio']);
ServiceType::create(['name' => 'Catering','kind_service_id' => '3','service_additions' => 'catering empresarial,refrigerios,alquiler de loza','rate_types' => 'Plato,Servicio']);
ServiceType::create(['name' => 'Bartender','kind_service_id' => '3','service_additions' => 'showbar,cockteles tradicionales,','rate_types' => 'Hora,Servicio']);
ServiceType::create(['name' => 'Preparación de platos exóticos','kind_service_id' => '3','service_additions' => 'oriental,mexicana,peruana,italiana,mediterranea,','rate_types' => 'Plato,Servicio']);

    }
}
