<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$routes = [
    "/",
    "/prodoral",
    "/nosotros",
    "/contacto",
    "/fugas-de-gas",
    "/gasfiter-sec",
    "/sello-rojo-sec",
    "/gas-trazador",
    "/fugas-de-agua",
    "/fugas-piscinas",
    "/deteccion-fugas-sin-romper",
    "/reparacion-calefont-sec",
    "/certificados-sec-gas"
];

$allPassed = true;
foreach ($routes as $route) {
    $request = Illuminate\Http\Request::create($route, 'GET');
    $response = $kernel->handle($request);
    $status = $response->getStatusCode();
    echo "Route [{$route}] => Status {$status}\n";
    if ($status !== 200) {
        $allPassed = false;
        echo "Error body:\n" . substr($response->getContent(), 0, 500) . "\n";
    }
}

if ($allPassed) {
    echo "\n=== ALL 13 ROUTES RETURNED HTTP 200 OK! ===\n";
} else {
    echo "\n=== SOME ROUTES FAILED! ===\n";
    exit(1);
}
