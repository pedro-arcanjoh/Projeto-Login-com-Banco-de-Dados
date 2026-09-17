<?php

$numeros = [45, 12, 89, 3, 67, 21, 100, 8, 55];

$maiorNum = 0;
$menorNum = 50;
$pMaior = 0;
$pMenor = 0;

for($i = 0; $i < count($numeros); $i++){
    if($numeros[$i] > $maiorNum){
        $maiorNum = $numeros[$i];
        $pMaior = $i;
    } else if ($numeros[$i] < $menorNum){
        $menorNum = $numeros[$i];
        $pMenor = $i;
    }
}

echo $maiorNum."\n";
echo $menorNum."\n";
echo ($pMaior+1)."\n";
echo ($pMenor+1)."\n";


?>