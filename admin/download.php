<?php
include('include/config.php');
$id = base64_decode($_REQUEST['id']);
$owner = mysqli_query($conn,'SELECT * FROM owner where id ="'.$id.'" ');
$own = mysqli_fetch_array($owner,MYSQLI_ASSOC);
$doc = $own['idProff'];
// define results into variables
$file='../idproofs/'.$doc;
$size=mysqli_query($own,0,"size");
$type=mysqli_query($own,0,"type");
$content=mysqli_query($own,0,"content");

header("Content-disposition: attachment; filename='".$doc."'");
header("Content-length: $size");
header("Content-type: $type");
?> 