<?php

//name of file
$filename = 'databasebackup';
require_once('conn.php');

// temp variable
$templine = '';
// read in file
$lines = file($filename);
// loop through each line
foreach ($lines as $line)
{
 // skip if it's a comment
if (substr($line, 0, 2) == '---' || $line == '')
   continue;

// add this line to the current segment
$templine .= $line;
// if it has a semicolon at the end, it's the end of the query
if (substr(trim($line), -1, 1) == ';')
{
   // perform the query
   mysql_query($templine) or print ('Error performing the query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
   // reset temp variable to empty
   $templine = '';
}
}
  echo "Tables imported successfully";
?>
