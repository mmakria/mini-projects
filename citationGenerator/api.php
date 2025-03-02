<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *"); // Permet l'accès à l'API depuis n'importe où

// Charger les citations depuis le fichier JSON
$filename = "citations_2000.json";
if (!file_exists($filename)) {
    echo json_encode(["error" => "Fichier de citations non trouvé."]);
    exit;
}

$citations = json_decode(file_get_contents($filename), true);
if (!$citations) {
    echo json_encode(["error" => "Impossible de charger les citations."]);
    exit;
}

// Sélectionner une citation aléatoire
$citationAleatoire = htmlspecialchars($citations[array_rand($citations)], ENT_QUOTES, 'UTF-8');

// Retourner la citation en JSON
echo json_encode(["citation" => $citationAleatoire]);
exit;