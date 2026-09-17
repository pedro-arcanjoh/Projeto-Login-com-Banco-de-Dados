<?php

$notas = [7.5, 4.0, 8.5, 6.0, 9.0, 3.5, 10.0, 5.5];

$media = 0;
$aciMedia = 0;
$abaMedia = 0;
$maior = $notas[0];
$menor = $notas[0];
$soma = 0;

foreach($notas as $nota){
    $soma += $nota;
    if($nota >= 6){
        $aciMedia ++;
    } else {
        $abaMedia ++;
    }
    if($nota > $maior){
        $maior = $nota;
    } if($nota < $menor){
        $menor = $nota;
    }
}

$media = ($soma/count($notas));

echo $media."\n";
echo $aciMedia."\n";
echo $abaMedia."\n";
echo $maior."\n";
echo $menor."\n";




?>