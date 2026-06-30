<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Declaración Anual Personas Físicas',
                'description' => 'Elaboración y presentación de la declaración anual para personas físicas, asegurando el cumplimiento y maximizando tus deducciones personales.',
                'price' => 1500,
                'status' => 'active',
            ],
            [
                'name' => 'Declaración Anual Personas Morales',
                'description' => 'Cálculo, revisión y presentación de la declaración anual para empresas, con análisis detallado de estados financieros.',
                'price' => 4500,
                'status' => 'active',
            ],
            [
                'name' => 'Contabilidad Mensual RESICO',
                'description' => 'Gestión contable y fiscal mensual para el Régimen Simplificado de Confianza, incluyendo declaraciones y cálculo de impuestos.',
                'price' => 1200,
                'status' => 'active',
            ],
            [
                'name' => 'Contabilidad Mensual Actividad Empresarial',
                'description' => 'Registro de ingresos y egresos, conciliación bancaria y presentación de declaraciones mensuales para personas con actividad empresarial.',
                'price' => 1800,
                'status' => 'active',
            ],
            [
                'name' => 'Contabilidad Mensual Plataformas Digitales',
                'description' => 'Cálculo de retenciones e impuestos definitivos o provisionales por ingresos obtenidos mediante Uber, Mercado Libre, Airbnb, etc.',
                'price' => 1000,
                'status' => 'active',
            ],
            [
                'name' => 'Regularización Fiscal (Por Ejercicio)',
                'description' => 'Ponte al día con el SAT. Calculamos y presentamos declaraciones atrasadas de ejercicios anteriores para evitar multas.',
                'price' => 3500,
                'status' => 'active',
            ],
            [
                'name' => 'Alta ante el SAT y Cita para e.firma',
                'description' => 'Te asesoramos en el proceso de inscripción al RFC y te ayudamos a gestionar tu cita para la Firma Electrónica (e.firma).',
                'price' => 800,
                'status' => 'active',
            ],
            [
                'name' => 'Maquila de Nómina Mensual (hasta 10 empleados)',
                'description' => 'Cálculo de nómina, retenciones de ISR, cuotas obrero-patronales del IMSS, INFONAVIT y emisión de recibos timbrados.',
                'price' => 2500,
                'status' => 'active',
            ],
            [
                'name' => 'Asesoría Fiscal Especializada (Por Hora)',
                'description' => 'Sesión de asesoría uno a uno para resolver dudas específicas sobre tu situación fiscal, estrategias de deducción o negocios.',
                'price' => 950,
                'status' => 'active',
            ],
            [
                'name' => 'Trámite de Devolución de Impuestos',
                'description' => 'Análisis de saldos a favor y gestión del trámite de devolución manual ante el SAT hasta su resolución.',
                'price' => 3000,
                'status' => 'active',
            ],
            [
                'name' => 'Planeación y Estrategia Fiscal Corporativa',
                'description' => 'Diseño de estrategias a medida para optimizar la carga tributaria de tu empresa dentro del marco legal vigente.',
                'price' => 8000,
                'status' => 'active',
            ],
            [
                'name' => 'Aclaración de Requerimientos y Multas SAT',
                'description' => 'Atención, análisis y respuesta a requerimientos emitidos por la autoridad fiscal para evitar embargos o sanciones mayores.',
                'price' => 2200,
                'status' => 'active',
            ],
            [
                'name' => 'Auditoría Financiera Preventiva',
                'description' => 'Revisión exhaustiva de tus registros contables para identificar riesgos fiscales antes de una revisión oficial.',
                'price' => 12000,
                'status' => 'active',
            ],
            [
                'name' => 'Reactivación de Sellos Digitales (CSD)',
                'description' => 'Trámite de aclaración para desvirtuar las causas por las que el SAT restringió o canceló tus sellos para facturar.',
                'price' => 4500,
                'status' => 'active',
            ],
            [
                'name' => 'Estudio de Precios de Transferencia',
                'description' => 'Análisis y documentación requerida para operaciones entre partes relacionadas según las disposiciones del ISR.',
                'price' => 15000,
                'status' => 'active',
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(['name' => $service['name']], $service);
        }
    }
}
