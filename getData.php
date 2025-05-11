<?php
// Función para generar IPs falsas
function fakeIp() {
    return rand(1, 255) . '.' . rand(0, 255) . '.' . rand(0, 255) . '.' . rand(0, 255);
}

// Función para generar User Agents falsos
function fakeUserAgent() {
    $agents = [
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
        'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.2 Mobile/15E148 Safari/604.1',
        'Mozilla/5.0 (Linux; Android 14) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.210 Mobile Safari/537.36'
    ];
    return $agents[array_rand($agents)];
}

// Recopilación de datos con valores por defecto
$clientData = [];
$fakeData = [];

// IP
$clientData['ip'] = $_SERVER['REMOTE_ADDR'] ?? fakeIp();
$fakeData['ip'] = !isset($_SERVER['REMOTE_ADDR']);

// IP Forwarded
$clientData['ip_forwarded'] = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? fakeIp();
$fakeData['ip_forwarded'] = !isset($_SERVER['HTTP_X_FORWARDED_FOR']);

// Hostname
$clientData['hostname'] = @gethostbyaddr($clientData['ip']) ?: 'host-' . bin2hex(random_bytes(2)) . '.fake';
$fakeData['hostname'] = ($clientData['hostname'] === $clientData['ip']);

// User Agent
$clientData['user_agent'] = $_SERVER['HTTP_USER_AGENT'] ?? fakeUserAgent();
$fakeData['user_agent'] = !isset($_SERVER['HTTP_USER_AGENT']);

// Idioma
$clientData['idioma'] = isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) 
    ? substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) 
    : '??';
$fakeData['idioma'] = !isset($_SERVER['HTTP_ACCEPT_LANGUAGE']);

// Referencia
$clientData['pagina_referer'] = $_SERVER['HTTP_REFERER'] ?? 'https://fake-referer.example.com';
$fakeData['pagina_referer'] = !isset($_SERVER['HTTP_REFERER']);

// Fecha/Hora (siempre real)
$clientData['fecha_hora'] = date('Y-m-d H:i:s');

$clientDataJSON = json_encode($clientData);
$fakeDataJSON = json_encode($fakeData);
