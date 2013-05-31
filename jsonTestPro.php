<?php
//Casey Balzer
//Media Post
//4-6-13
//crb68@pitt.edu
//procedural test page
include 'jsonPro.php';
$path ='jobs.json';

echo "<font color=\"green\"> ----Listing Items----</font></br></br>"; 
$test = jsonList($path);

  $test = returnVal("2",$path);
  echo "</br></br>";
  $test["fname"] = "Jayden";
  
  $test2 = addValue("2",$test,$path);
  echo "<font color=\"green\"> ----fname changed to Jayden----</font></br></br>";
  $test = jsonList($path);
  
  $test = returnVal("2",$path);
  echo "</br></br>";
  $test["fname"] = "John"; 
  $test2 = addValue("2",$test,$path);
  $test2 = addValue("3","Casey Balzer",$path);
  
  echo "<font color=\"green\"> ----fname changed to John and Casey Balzer added----</font></br></br>";
  $test = jsonList($path);
  
 $test = jsonList($path);
 
 $test = jsonUnsetKey("3",$path);
  echo "</br></br>";
  echo "<font color=\"green\"> ----Casey Balzer Removed----</font></br></br>";
  $test = jsonList($path);
  
  $test=retMultiDim($path);
  echo "</br></br>";
  echo "<font color=\"green\"> ----Var dump of returned multi Dim array----</font></br></br>";
  var_dump($test);
?>