<?php

$candidatos = [
    ["numero" => 10, "nome" => "Ana", "votos" => 0],
    ["numero" => 20, "nome" => "Carlos", "votos" => 0],
    ["numero" => 30, "nome" => "Maria", "votos" => 0]
];

$votos = [10, 20, 10, 30, 30, 30, 20, 10, 50, 30, 20, 30, 50, 10];

$votosNulos = 0;
$votosValidos = 0;
$totalVotos = 0;
$candidatoVencedor = "";
$votosVencedor = 0;

foreach($votos as $voto){

    foreach($candidatos as $index => $candidato){
        if($voto == $candidato['numero']){
            $candidatos[$index]['votos']++;
            $votosValidos++;
        }
    }

    if($voto != 10 && $voto != 20 && $voto != 30){
        $votosNulos++;
    }
}

foreach($candidatos as $candidato){
    if($candidato['votos'] > $votosVencedor){
        $votosVencedor = $candidato['votos'];
        $candidatoVencedor = $candidato['nome'];
    }
}

$totalVotos = $votosValidos +$votosNulos;

echo $candidatos[0]['nome']." - Votos: ".$candidatos[0]['votos']."\n";
echo $candidatos[1]['nome']." - Votos: ".$candidatos[1]['votos']."\n";
echo $candidatos[2]['nome']." - Votos: ".$candidatos[2]['votos']."\n";
echo "Votos nulos: ".$votosNulos."\n";
echo "Votos válidos: ".$votosValidos."\n";
echo "Total de votos: ".$totalVotos."\n";

?>