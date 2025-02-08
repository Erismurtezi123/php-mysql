<?php

function modulo($n){
    if(($n % 2) == 0){
        return"$n is fully divisible by 2";
    }
    else{
        return "$n is not fully divisible by 2";
    }
}

echo(modulo(5)."<br>");
echo(modulo(8)."<br>");
echo(modulo(10)."<br>");
echo(modulo(57)."<br>");
echo(modulo(3)."<br>");
?>