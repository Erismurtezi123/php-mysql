<?php

$dogs = array(
    array("chihuahua","Mexico", 20),
    array("Husky","Siberia", 15),
    array("pitbull","England", 10),
);

echo $dogs[0][0]. ": Origin:". $dogs[0][1]. ", Life Span:". $dogs[0][2]. ".<br>";
echo $dogs[0][0]. ": Origin:". $dogs[0][1]. ", Life Span:". $dogs[0][2]. ".<br>";
echo $dogs[0][0]. ": Origin:". $dogs[0][1]. ", Life Span:". $dogs[0][2]. ".<br>";

for($row = 0; $row<3; $row++){
    echo "<p><b>Row number $row<\b><p\>";
    echo "<ul>";
    for($col =0; $col<3; $col++){
        echo "<li>". $dogs [$row][$col]. "<\li>";
    }
    echo "<\ul>";
}



?>


















