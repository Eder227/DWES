<?php
require_once "Monoplaza.php";
require_once "F1.php";
require_once "F2.php";
require_once "F3.php";
require_once "F4.php";
require_once "FAcademy.php";

// -----------------------------
// Configuración de la API
// -----------------------------
$sessionKey = '9158'; // tu session_key de OpenF1
$driverNumbers = [16, 44]; // pilotos que queremos

// -----------------------------
// Función para obtener todos los pilotos
// -----------------------------
function getAllDrivers($sessionKey) {
    $url = "https://api.openf1.org/v1/drivers?session_key=$sessionKey";
    $response = @file_get_contents($url);
    if (!$response) return null;
    return json_decode($response, true);
}

// -----------------------------
// Obtener pilotos de la API
// -----------------------------
$allDrivers = getAllDrivers($sessionKey);
$pilotos = [];

if ($allDrivers) {
    foreach ($allDrivers as $driver) {
        if (in_array($driver['driver_number'], $driverNumbers)) {
            $pilotos[$driver['driver_number']] = new F1(
                $driver['full_name'] ?? 'Desconocido',
                $driver['country_code'] ?? 'ND',
                $driver['driver_number'] ?? 0,
                $driver['team_name'] ?? 'ND',
                0,
                $driver['broadcast_name'] ?? 'ND'
            );
        }
    }
}

// -----------------------------
// Mostrar datos iniciales
// -----------------------------
echo "<h2>Pilotos iniciales:</h2>";
foreach ($pilotos as $p) {
    echo $p->getNombrePiloto() . " | " . $p->getEscuderia() . " | Puntos: " . $p->getPuntosCategoria() . "<br>";
}

// -----------------------------
// Simular carrera
// -----------------------------
if (isset($pilotos[16])) $pilotos[16]->otorgarPuntos(1, true);  // Leclerc 1º + vuelta rápida
if (isset($pilotos[44])) $pilotos[44]->otorgarPuntos(3, false); // Hamilton 3º

echo "<h2>Tras carrera simulada:</h2>";
foreach ($pilotos as $p) {
    echo $p->getNombrePiloto() . " | " . $p->getEscuderia() . " | Puntos: " . $p->getPuntosCategoria() . "<br>";
}
?>
 