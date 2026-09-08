@props([
    'metaTitle' => 'SellafuGas® | Reparación de Fugas de Gas Sin Romper SEC',
    'metaDescription' => 'Sellado de fugas de gas sin romper con Prodoral R6-1. Domingo Isain, Gasfiter SEC Clase 3. Garantía escrita 3 años y certificación DS66. Fono: 949 877 316.',
    'canonicalUrl' => url()->current(),
    'metaImage' => asset('images/og-share-whatsapp.jpg'),
    'phoneDisplay' => '949 877 316',
    'phoneInt' => '+56949877316',
    'includeDefaultSchema' => true,
])

@php
    // Ensure telephone number is prioritized in OG title and OG description
    $formattedOgTitle = str_contains($metaTitle, '949 877 316') 
        ? $metaTitle 
        : "📞 949 877 316 | " . $metaTitle;

    $formattedOgDescription = str_contains($metaDescription, '949 877 316')
        ? $metaDescription
        : "📞 Urgencias: 949 877 316 · " . $metaDescription;
@endphp

<!-- Primary SEO Meta Tags -->
<title>{{ $metaTitle }}</title>
<meta name="description" content="{{ $metaDescription }}">
<meta name="keywords" content="sellafugas, fuga de gas, fugas de gas, gasfiter certificado sec, prodoral r6-1, reparacion de fugas de gas sin romper, sellar fuga de gas, detectar fuga de gas, ds66 sec, domingo isain">
<meta name="author" content="Domingo Isain Plaza Caamaño - SellafuGas®">
<meta name="robots" content="index, follow">
<meta name="google-site-verification" content="a9P5USHEyJSjisUnH1tW_eOUAeGYnijF3NcL327vUOY" />
<link rel="canonical" href="{{ $canonicalUrl }}">

<!-- Favicon & Mobile Touch Icons -->
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">
<link rel="icon" type="image/webp" href="{{ asset('images/logotipo-sellafugas.cl.webp') }}">
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

<!-- Open Graph / Facebook / WhatsApp Meta Tags (Facebook Debugger Ready) -->
<meta property="og:site_name" content="SellafuGas® · Domingo Isain Gasfiter SEC">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ $canonicalUrl }}">
<meta property="og:title" content="{{ $formattedOgTitle }}">
<meta property="og:description" content="{{ $formattedOgDescription }}">
<meta property="og:image" content="{{ $metaImage }}">
<meta property="og:image:secure_url" content="{{ $metaImage }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:type" content="image/jpeg">
<meta property="og:image:alt" content="SellafuGas® Domingo Isain Gasfiter SEC - Llame al {{ $phoneDisplay }}">
<meta property="og:locale" content="es_CL">

<!-- Twitter / X Card Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:url" content="{{ $canonicalUrl }}">
<meta name="twitter:title" content="{{ $formattedOgTitle }}">
<meta name="twitter:description" content="{{ $formattedOgDescription }}">
<meta name="twitter:image" content="{{ $metaImage }}">

@if($includeDefaultSchema)
<!-- Schema.org JSON-LD (Local Business & Emergency Service with Contact Phone) -->
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "EmergencyService",
  "name": "SellafuGas® - Domingo Isain Plaza Caamaño",
  "url": "{{ $canonicalUrl }}",
  "telephone": "{{ $phoneInt }}",
  "priceRange": "$$$",
  "image": "{{ $metaImage }}",
  "description": "{{ $metaDescription }}",
  "address": {
    "@@type": "PostalAddress",
    "addressLocality": "Santiago",
    "addressRegion": "Región Metropolitana",
    "addressCountry": "CL"
  },
  "geo": {
    "@@type": "GeoCoordinates",
    "latitude": "-33.4489",
    "longitude": "-70.6693"
  },
  "openingHoursSpecification": {
    "@@type": "OpeningHoursSpecification",
    "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
    "opens": "00:00",
    "closes": "23:59"
  },
  "contactPoint": {
    "@@type": "ContactPoint",
    "telephone": "{{ $phoneInt }}",
    "contactType": "emergency",
    "availableLanguage": "Spanish"
  }
}
</script>
@endif
