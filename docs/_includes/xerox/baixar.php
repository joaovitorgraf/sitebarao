<?php
$file = filter_input(INPUT_GET, 'defineDoc'); 

header("Content-Description: File Transfer"); 
header("Content-Type: application/octet-stream"); 
header("Content-Disposition: attachment; filename=" . basename($file)); 

readfile ($file);
exit(); 
?>