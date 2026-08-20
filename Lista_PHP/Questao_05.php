<?php

$numero = 19;

if($numero % 3 == 0 && $numero % 5 == 0){
    echo $numero." é múltiplo de 3 e 5";
} else if($numero % 3 == 0){
    echo $numero." é múltiplo de 3";
} else if($numero % 5 == 0){
    echo $numero." é múltiplo de 5";
} else {
    echo $numero." não é mutiplo nem de 3, nem de 5";
}

?>