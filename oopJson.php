<?php
//Casey Balzer
//Media Post
//4-6-13
//crb68@pitt.edu

class jsonTasks {
var $jPath;   //using keyword var for php backwards compatibility 
var $json_c;

//Constructor sets obj
function jsonTasks($path)
{
$this->jPath=$path;
$data=file_get_contents("$path");
$json_a = json_decode($data, true);
$this->json_c=$json_a;
}
     //recursively lists json array
    function jsonList()
    {
    $test = $this -> checkIsEmpty();
    
        if($test==1)
	    {
	        foreach($this->json_c as $key => $value)
             {
              echo $key.":";
              $test = $this -> checkIsList($value);
              
              if($test==0)
                 {
                 echo $value."</br>";
                 }
              
             }//end foreach	     
	    }
	    else
	    {
	    return $test;
	    }

    }
    
    //just checks if json is empty
    function checkIsEmpty()
    {
    $count=count($this->json_c);
  
    if($count < 1) {
    return 0;
    }
    else{
    return 1;
    }  
   }//end checkIsEmpty
   
   //just checks for nested associative arrays or normal arrays
   function checkIsList($value)
   {
       if(is_array($value))
       {
       
         
         if($value == array_values($value))
         {
          $count=count($value);
          
              for($i=0;$i<$count;$i++)
              {
               $count2=$i+1;
                 if($count2 < $count)
                 {
                 echo " ".$value[$i].",";
                 }
                 else
                 {
                  echo " ".$value[$i];
                 }
              }
              echo "</br>";
              return 1;
         }
        else
        {  
          foreach($value as $key2 => $value2)
            {
            
              echo $key2.":";
              $test = $this -> checkIsList($value2);
                 
                 if($test==0)
                 {
                 echo ":".$value2."</br>";
                 }
            }//end foreach   
            return 1;     
        }//end else
       }//end outter if
       else
       {
       return 0;
       }
   }//end checkIsList()
    
   //add a key and value, takes a key and a value 
   function addValue($k,$v)
   {
   $this -> json_c[$k] = $v;
   $data = json_encode($this -> json_c);
   file_put_contents($this -> jPath, $data); 
   return 1;
   
   }//end addValue()
  
  //unset entire json
  function jsonUnset()
  {
  $count=count($this -> json_c);
    if($count >= 1)
    {
  foreach ($this->json_c as $key => $value){
      unset($this->json_c[$key]);
       }
      $data = json_encode($this -> json_c);
      file_put_contents($this -> jPath, $data); 
      return 1;
      }
      else
      {
      return 0;
      }
  } //end jsonUnset

   
   //use this function to return a specific key value or to get the structure to edit
   //I get it, its a test but the nesting is silly so just giving
   //the user the opportunity to get a value from key, the user can then edit to his
   // or her hearts desire and just replace the existing key with edited value
   function returnVal($key)
   {
   
      foreach($this->json_c as $key2 => $value)
      {
         if($key==$key2)
         {
          return $value;
         }
      } 
      return 0;
   
}//end return value
//takes a specific key to unset
function jsonUnsetKey($k)
  {
  unset($this -> json_c[$k]);
  $data = json_encode($this -> json_c);
  file_put_contents($this -> jPath, $data); 
      return 1;
  }//end jsonUnsetKey

}
?>