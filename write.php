<?php
$myFile = "bill.json";
if (!file_exists($myFile)) {
  print 'File not found';
}
$fh = fopen($myFile, 'a') or die("can't open file");
$stat = fstat($fh);
ftruncate($fh, $stat['size']-1);
$stringData = $_GET["data"];
fwrite($fh, ",".$stringData."]");
fclose($fh);


$myFile1 = "invoice.txt";
$fh1 = fopen($myFile1, 'w') or die("can't open file");
$obj = json_decode($stringData);
$inv = intval($obj->{'invoice'}) +1;
fwrite($fh1, $inv);
fclose($fh1)
?>