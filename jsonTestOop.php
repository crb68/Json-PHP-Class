<?php
//Casey Balzer
//Media Post
//4-6-13
//crb68@pitt.edu
//oopJson test page
include 'oopJson.php';
$path='jobs.json';
$json = new jsonTasks($path);
echo "<font color=\"green\"> ----Listing Items----</font></br></br>"; 
$test = $json -> jsonList();
 echo "</br></br>";  
$test = $json -> returnVal("2");
$test["fname"] = "Paul";


 $test2 = $json -> addValue("2",$test); 
 
 echo "</br></br>";
 
  echo "<font color=\"green\"> ----Edited fname.... is now Paul ----</font></br></br>"; 
   
   echo "<font color=\"green\"> ----Listing Items----</font></br></br>"; 
$test = $json -> jsonList();
$test = $json -> addValue("3","Casey Balzer"); 
$test = $json -> returnVal("2");
$test["fname"] = "John";
$test2 = $json -> addValue("2",$test);


echo "</br></br>";
echo "<font color=\"green\"> ----Casey Balzer added Edited fname.... is now John ----</font></br></br>";
$test = $json -> jsonList();
$test = $json -> jsonUnsetKey("3");

echo "<font color=\"green\"> ----Casey Balzer removed ----</font></br></br>";
$test = $json -> jsonList();

?>