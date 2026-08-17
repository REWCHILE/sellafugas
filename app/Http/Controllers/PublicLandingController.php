<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicLandingController extends Controller
{
    /**
     * 1. Fugas de Gas & Prodoral R6-1 Landing Page
     */
    public function fugasGas()
    {
        return view('landings.fugas-de-gas', [
            'metaTitle' => 'Reparación y Sellado de Fugas de Gas Sin Romper | Prodoral R6-1 SEC',
            'metaDescription' => 'Servicio de sellado de fugas de gas no visibles en red de cañerías con tecnología alemana Prodoral R6-1. Gasfíter autorizado SEC Domingo Isain. Sin picar muros ni pisos. 3 años de garantía.',
            'canonicalUrl' => url('/fugas-de-gas'),
            'currentSlug' => 'fugas-de-gas',
        ]);
    }

    /**
     * 2. Gasfíter Certificado SEC a Domicilio Landing Page
     */
    public function gasfiterSec()
    {
        return view('landings.gasfiter-sec', [
            'metaTitle' => 'Gasfiter Certificado Autorizado SEC a Domicilio | Domingo Isain Clase 3',
            'metaDescription' => 'Gasfíter autorizado por la SEC Clase 3 Domingo Isain Plaza Caamaño (RUT 12.738.961-6). Certificados oficiales de hermeticidad DS66, sellado de fugas, regularización de sellos rojos y emergencias.',
            'canonicalUrl' => url('/gasfiter-sec'),
            'currentSlug' => 'gasfiter-sec',
        ]);
    }

    /**
     * 3. Detección con Gas Trazador Landing Page
     */
    public function gasTrazador()
    {
        return view('landings.gas-trazador', [
            'metaTitle' => 'Detección de Fugas con Gas Trazador (Nitrógeno/Hidrógeno) Sin Romper',
            'metaDescription' => 'Localización exacta de fugas invisibles en cañerías subterráneas y empotradas con gas trazador y sensor electroacústico. Precisión milimétrica sin picar pisos ni baldosas.',
            'canonicalUrl' => url('/gas-trazador'),
            'currentSlug' => 'gas-trazador',
        ]);
    }

    /**
     * 4. Detección y Reparación de Fugas de Agua Potable Landing Page
     */
    public function fugasAgua()
    {
        return view('landings.fugas-de-agua', [
            'metaTitle' => 'Detección de Fugas de Agua Potable Sin Romper | Geófono y Ultrasonido',
            'metaDescription' => 'Especialistas en detección y reparación de fugas de agua no visibles en casas, edificios y departamentos. Geófono digital de alta sensibilidad, gas trazador y termografía.',
            'canonicalUrl' => url('/fugas-de-agua'),
            'currentSlug' => 'fugas-de-agua',
        ]);
    }

    /**
     * 5. Detección de Fugas en Piscinas Sin Vaciar Landing Page
     */
    public function fugasPiscinas()
    {
        return view('landings.fugas-piscinas', [
            'metaTitle' => 'Detección y Reparación de Fugas en Piscinas Sin Vaciar | SellafuGas',
            'metaDescription' => 'Localizamos y reparamos filtraciones y pérdidas de agua en piscinas de hormigón y fibra sin vaciar el agua. Detección electroacústica e hidrófono sumergible. Atención rápida.',
            'canonicalUrl' => url('/fugas-piscinas'),
            'currentSlug' => 'fugas-piscinas',
        ]);
    }

    /**
     * 6. Sello Rojo SEC & Regularización Urgente
     */
    public function selloRojo()
    {
        return view('landings.sello-rojo-sec', [
            'metaTitle' => 'Levantamiento y Regularización de Sello Rojo de Gas SEC | Domingo Isain',
            'metaDescription' => 'Servicio urgente de levantamiento de sello rojo en instalaciones de gas. Sellado de cañerías, pruebas de hermeticidad y emisión de certificado oficial SEC para reposición inmediata de suministro.',
            'canonicalUrl' => url('/sello-rojo-sec'),
            'currentSlug' => 'sello-rojo-sec',
        ]);
    }

    /**
     * 7. Detección de Fugas y Filtraciones Sin Romper
     */
    public function deteccionSinRomper()
    {
        return view('landings.deteccion-fugas-sin-romper', [
            'metaTitle' => 'Detección de Fugas y Filtraciones Sin Romper Muros ni Pisos | SellafuGas',
            'metaDescription' => 'Localización no destructiva de fugas de gas y agua con tecnología avanzada: geófono, gas trazador, cámara termográfica y manometría digital. Inspección precisa en Santiago y regiones.',
            'canonicalUrl' => url('/deteccion-fugas-sin-romper'),
            'currentSlug' => 'deteccion-fugas-sin-romper',
        ]);
    }

    /**
     * 8. Reparación y Mantenimiento de Calefont SEC
     */
    public function reparacionCalefont()
    {
        return view('landings.reparacion-calefont-sec', [
            'metaTitle' => 'Reparación e Instalación de Calefont Gasfiter Autorizado SEC | Domingo Isain',
            'metaDescription' => 'Servicio técnico especializado en calefont a gas tiro natural, forzado e ionizado (Junkers, Splendid, Mademsa, Neckar). Instalador autorizado SEC Clase 3 con certificación oficial.',
            'canonicalUrl' => url('/reparacion-calefont-sec'),
            'currentSlug' => 'reparacion-calefont-sec',
        ]);
    }

    /**
     * 9. Certificados Oficiales de Gas SEC DS66
     */
    public function certificadosSec()
    {
        return view('landings.certificados-sec-gas', [
            'metaTitle' => 'Certificados Oficiales de Gas SEC DS66 | Pruebas de Hermeticidad',
            'metaDescription' => 'Emisión de Certificados Oficiales de Hermeticidad e Instalaciones de Gas bajo Decreto Supremo DS66 por Domingo Isain (Gasfiter SEC Clase 3). Código QR verificable en la plataforma SEC.',
            'canonicalUrl' => url('/certificados-sec-gas'),
            'currentSlug' => 'certificados-sec-gas',
        ]);
    }
}
