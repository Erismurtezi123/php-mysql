<?php

$num = 5;
if($num < 0 ){
    echo "$num is less than 0";
}else{
    echo "$num is bigger than 0";
}

if($num < 0){
    echo "The value of the number is negative <br>";
}elseif($num == 0){
    echo"The value of the number is zero <br>";
}else{
    echo"The value of the number is positive <br>";
}

$age = 15;
if(($age > 12) && ($age<20)){
    echo "You are a teenagre <br>";
}

$a = 20;
$b = 10;

if ($a == $b){
    echo"the value of those tow is equal <br>";
}else{
    echo"the value of those tow is equal <br>";
}


$day = "Monday";
switch($day){
    case'Monday';
    echo"Start of the week <br>";
    break;
    case'Tuesday':
    echo"Let's get througt the week <br>";
    break;
    case'Wedensday':
    echo"The middle of the week <br>";
    break;
    case'Thursday':
    echo"Almost there <br>";
    break;
    case'Friday':
    echo"Weekend is here! <br>";
    break;
    default;
    echo"invalid day <br>";
    break;
}

#while loop
$x = 1;
while($x <= 5){
    echo"The number is: $x <br>";

    $x++;
}
$y = 0;
do{
    echo" The number is: $y <br> <br>";
    $y++;
}while($y <=5);

?>