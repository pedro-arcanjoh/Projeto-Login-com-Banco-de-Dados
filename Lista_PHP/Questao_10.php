<?php

$n1 = 1;
$n2 = 1;

echo "0\n";
echo "1\n";

for($i=1; $i <= 13; $i++){
    echo $n2."\n";
    $n2 += $n1;
    $n1 = $n2 - $n1;

}
?>