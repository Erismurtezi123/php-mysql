<?php
//fopen we use to open a file 
// $my_file = fopen("ds.txt", "w");
// //fclose we use it to close a file
// fclose($my_file);

// $myfile_name = "ds.txt";
// $my_file = fopen($myfile_name,"r");
// $my_size = filesize($my_filename);
// $my_filedata = ferad($my_file, $my_size);

// $file  = fopen("ds.txt","r");
// while(!feof($file)){
//     echo fgets ($file). "<br>"
// }
// fclose($file);

//fwrite makes us weite new text in an existing file
// $myfile = fopen("ds.txt", "w");
// $mytext = "digital school \n";
// fwrite($myfile, $my_text);

// //w+ mode leta us create a new file 
// $h = fopen ("data.txt", "w+");
// write($h, "Test 1");

// //a+ mode lets us write content in a file 
// $h = fopen ("data.txt", "a+");
// fwrite($h, "\n Add more lines to the files");
// flose($h);

//file_put_contents is  identic to fopen (), fwrite(), fclose()
file_put_contents("test.txt", "add more text");
echo file_get_contents("test.txt");
?>