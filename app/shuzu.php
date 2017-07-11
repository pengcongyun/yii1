<?php
$a=[11,22,33,44,55,66,77,88,99];
$b=[1,2,3,4,5,6,7,8,9];
$c=[];
foreach ($a as $a1){
    foreach ($b as $b1){
        foreach ($b as $b2){
            $aa=$b1.$a1.$b2;
            $c[]=$aa;
        }
    }
}
var_dump($c);
var_dump(array_rand(array_values($c)));