<?php

$age = 15;
switch($age){
    case($age >=0 && $age <18):
        echo"You are a minior <br>";
        break; //ne momentin qe plotsohet kushti i  pare  del prej switch-it me break
        case ($age>= 18 && $age<=25);
        echo "You are a young adult <br>";
        break;
        case($age > 25);
        echo"You are an adult <br>";
        break;
        default:
        echo"invalid age input <br>"; //kjo vendoset qe asnjera nga kushtet nuk permbushet
    }
?>