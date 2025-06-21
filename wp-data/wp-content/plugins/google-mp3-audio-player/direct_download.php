<?php
if( !isset($_GET['file']) || empty($_GET['file']) )
	exit('Access denied!');

$file = $_GET['file'];
$filename_parts = explode("/",$file);
$filename = $filename_parts[count($filename_parts)-1];

header ("Content-Type: application/octet-stream");
header ("Content-disposition: attachment; filename=".$filename.";");
header("Content-Length: ".filesize($file));

readfile($file);

exit;
?>