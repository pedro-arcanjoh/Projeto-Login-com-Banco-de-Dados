<?php

$numero = 8;
$contador = 1;

for($i=2; $i <= $numero; $i++){
    if($numero % $i == 0){
        $contador++;
    }
}

if($contador == 2){
    echo $numero." é primo.";
} else{
    echo $numero." não é primo.";
}

?>