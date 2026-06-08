<?php

if((45<17)<79){
    echo("vrai\n");
}else{
    echo("faux\n");
}

$count = 1;
for($i=2; $i<8; $i++) {
    if($i>=3&&$i<=6){
        continue;

    }
    $count++;
}
echo("$count\n");

$tab = array('a'=>3, 6, 'c'=>2, 'd'=>3, 9, 6);
$count = 3;
$value="error";
if(isset($tab[$count])) {
    $value = $tab[$count];
}
echo("$value\n");

function algo($c) {
    static $p = 6;
    $c += $p;
    $p -= 3;
    return $c;
}

$f = 6;
$f -= 2;
$f = algo($f);
echo("$f\n");

$f = algo($f);
$f = algo($f);
echo("$f\n");


?>
